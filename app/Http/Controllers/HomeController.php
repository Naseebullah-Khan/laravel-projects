<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(): object|null
    {
        $users = DB::table("users")->get(); # All Data
        // return $users;

        $user1 = DB::table("users")->find(1, ["name", "email"]); # You can only get single data by id
        // return $user1;
        # or
        $user2 = DB::table("users")->where("email", "nk0784494104@gmail.com")->first(); # You can get Single Data by any column
        // return $user2;

        $users1 = DB::table("users")->where("id", ">=", 3)->get();
        return $users1;
    }

    public function about(): View
    {
        return view("about.index");
    }
}
