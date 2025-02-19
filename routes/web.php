<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;

# Routes: A route act as a mapping between a specific URL and the cross-bonding code that should be executed in response to the user request.

Route::get('/', function (): View {
    return view('welcome');
    // return "Hello, World!";
});

Route::get("/about", function (): string {
    return "This is About Page.";
});

Route::get("/posts/{id}/{slug}", function ($id, $slug): string {
    return "This is Post number {$id} - {$slug}.";
});
