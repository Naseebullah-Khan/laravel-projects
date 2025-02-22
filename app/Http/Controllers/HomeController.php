<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(): View
    {
        DB::table("users")->where("email", "nk0784494104@gmail.com")->update([
            "email" => "naseebullah_hoshmand@hotmail.com",
        ]); # You can get Single Data by any column
        return view("welcome");
    }

    public function about(): View
    {
        return view("about.index");
    }
}
