<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        # when you want create one user you can use create method.
        // User::create([
        //     "name" => "TestName1",
        //     "email" => "test1@email.com",
        //     "password" => "1234",
        //     "email_verified_at" => now(),
        // ]);

        # when you want to create one or more than one user then you can use insert method and it does not care about the model and interact directly with database thats why the casting in model does not work on password.
        User::insert([
            [
                "name" => "TestName4",
                "email" => "test4@email.com",
                "password" => "1234",
                "email_verified_at" => now(),
            ],
            [
                "name" => "TestName5",
                "email" => "test5@email.com",
                "password" => "1234",
                "email_verified_at" => now(),
            ],
        ]);

        return view("welcome");
    }

    public function about(): View
    {
        return view("about.index");
    }
}
