<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view("welcome");
    }

    public function about(): View
    {
        return view("about.index");
    }
}
