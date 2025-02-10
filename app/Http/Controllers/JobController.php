<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        // $jobs = Job::with("employer")->paginate(3);
        $jobs = Job::with("employer")->latest()->simplePaginate(3);
        // $jobs = Job::with("employer")->cursorPaginate(3);
        return view('jobs.index', ["jobs" => $jobs]);
    }

    public function create()
    {
        return view('jobs.create');

    }

    public function store()
    {
        // validate
        request()->validate([
            "title" => ["required", "min:3"],
            "salary" => ["required"],
        ]);

        $job = Job::create([
            "title" => request("title"),
            "salary" => request("salary"),
            "employer_id" => 1,
        ]);
        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );
        return redirect("/jobs");
    }

    public function show(Job $job)
    {
        return view('jobs.show', ["job" => $job]);
    }

    public function update(Job $job)
    {
        // validate
        request()->validate([
            "title" => ["required", "min:3"],
            "salary" => ["required"],
        ]);
        // authorize
        // update the job and persist
        // $job = Job::find($id); // if the job is not found, it will return null and the project will break.
        // $job = Job::findOrFail($id); // if the job is not found, it will abort.
        // // // first way
        // $job->title = request("title");
        // $job->salary = request("salary");
        // $job->save();
        // // second way
        $job->update([
            "title" => request("title"),
            "salary" => request("salary"),
        ]);
        // redirect to the job page
        return redirect("/jobs/{$job->id}");
    }

    public function destroy(Job $job)
    {
        // authorize
        // delete the job
        // Job::find($id)->delete(); // if the job is not found, it will return null and the project will break.
        // Job::findOrFail($job)->delete(); // if the job is not found, it will abort.
        $job->delete();
        // redirect to the jobs page
        return redirect("/jobs");
    }

    public function edit(Job $job)
    {
        // Gate::define("edit-job", function (User $user, Job $job) {
        //     return $job->employer->user->is($user);
        // }); // move to AppServiceProvider
        // if (Auth::guest()) {
        //     return redirect("/login");
        // }
        // if ($job->employer->user->isNot(Auth::user())) {
        //     abort(403);
        // }

        Gate::authorize("edit-info", $job);
        // // alternative for gate
        // if (Auth::user()->cannot("edit-job", $job)) {
        //     dd("failed");
        // }
        // if (Auth::user()->can("edit-job", $job)) {
        //     dd("success");
        // }

        return view('jobs.edit', ["job" => $job]);

    }
}
