<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $user = User::where("email", "mohammad@gmail.com")->first();
        $user->name = "Monir";
        $user->email = "monir@gmail.com";
        $user->save();


        return view("welcome");
    }

    public function about(): View
    {
        return view("about.index");
    }
}
