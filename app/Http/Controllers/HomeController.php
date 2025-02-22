<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(): View
    {
        DB::table("users")->insert([
            [
                "name" => "Mahmood",
                "email" => "mahmood@gmail.com",
                "password" => "123456789",
            ],
            [
                "name" => "Zafar",
                "email" => "zafar@gmail.com",
                "password" => "12345678",
            ]
        ]);
        return view("welcome");
    }

    public function about(): View
    {
        return view("about.index");
    }
}
