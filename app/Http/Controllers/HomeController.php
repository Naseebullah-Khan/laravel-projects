<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $user = new User();
        $user->name = "Farhad";
        $user->email = "farhad@gmail.com";
        $user->password = "12345678";
        $user->save();

        return view("welcome");
    }

    public function about(): View
    {
        return view("about.index");
    }
}
