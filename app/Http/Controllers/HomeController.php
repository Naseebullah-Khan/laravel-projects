<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(): Collection
    {
        # get data from the database using get method (returns data in the form of an collection)
        // $blogs = DB::table("blogs")->get(["title"]);
        // return $blogs;

        # get data from the database using select method (returns data in the form of an collection)
        // $blogs = DB::table("blogs")->select("description")->get();
        // return $blogs;

        # get data from the database using select method (returns data in the form of an collection and converts it to array)
        // $blogs = DB::table("blogs")->select("description")->get()->toArray();
        // dd($blogs);

        # get data from the database using pluck method (returns data in the form of an array) prefer way
        # you have to pass a column to key that has unique values
        $blogs = DB::table("blogs")->pluck("description", "id");
        return $blogs;
    }

    public function about(): View
    {
        return view("about.index");
    }
}
