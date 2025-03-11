<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;

Route::get('/', function (): View {
    return view('welcome');
});

Route::get("/users", function (): View {

    $users = User::all();

    return view("test", compact("users"));
});
