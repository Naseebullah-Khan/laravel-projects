<?php

use App\Models\Address;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;

Route::get('/', function (): View {
    return view('welcome');
});

Route::get("/users", function (): View {

    $users = User::all();
    $addresses = Address::all();

    return view("test", compact("users", "addresses"));
});

Route::get("/posts", function (): View {
    // Post::insert([
    //     [
    //         "user_id" => 1,
    //         "title" => "Learn Java",
    //     ],
    //     [
    //         "user_id" => 5,
    //         "title" => "Learn C++",
    //     ],
    //     [
    //         "user_id" => 2,
    //         "title" => "Learn C#",
    //     ],
    //     [
    //         "user_id" => 1,
    //         "title" => "Learn C",
    //     ],
    //     [
    //         "user_id" => 5,
    //         "title" => "Learn Python",
    //     ],
    // ]);

    $posts = Post::all();
    return view("posts", compact("posts"));
});
