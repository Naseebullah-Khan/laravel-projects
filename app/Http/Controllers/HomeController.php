<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        # get all the users
        // $users = User::all();

        // foreach ($users as $user) {
        //     echo $user->name . " --- " . $user->email;
        //     echo "<br/>";
        // }

        # get single user
        // $user = User::where("email", "mahmoud@gmail.com")->first();
        // dd($user);

        # if you want to get single user by id
        $user = User::find(3);
        dd($user);

        return view("welcome");
    }

    public function about(): View
    {
        return view("about.index");
    }
}
