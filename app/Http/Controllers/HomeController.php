<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(): View
    {
        DB::table("users")->where("email", "mahmood@gmail.com")->delete();
        return view("welcome");
    }

    public function about(): View
    {
        return view("about.index");
    }
}
