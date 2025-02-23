<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        # this way when the user does not exits it will throw an error
        // $user = User::where("email", "monir@gmail.com")->first();
        // $user->delete();

        # this way when the user does not exits it will not throw an error
        $user = User::findOrFail(4);
        $user->delete();

        return view("welcome");
    }

    public function about(): View
    {
        return view("about.index");
    }
}
