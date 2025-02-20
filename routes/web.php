<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;

# Routes: A route act as a mapping between a specific URL and the cross-bonding code that should be executed in response to the user request.

Route::get('/', function (): View {
    return view('welcome');
    // return "Hello, World!";
});

// php artisan make:view nameOfTheFileOrPath -> create a view
Route::get("/about", function (): View {
    return view("about.index");
});
