<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;

# Routes: A route act as a mapping between a specific URL and the cross-bonding code that should be executed in response to the user request.

Route::get('/', function (): View {
    return view('welcome');
    // return "Hello, World!";
});

Route::get("/about", function (): string {
    return "<h1>This is About Page.</h1>";
})->name("about");

Route::get("/posts/{id}/{slug}", function ($id, $slug): string {
    return "This is Post number {$id} - {$slug}.";
})->name("posts");

#php artisan route:list => list all routes in laravel project

Route::group(["prefix" => "post", "as" => "post."], function (): void {
    Route::get("/create", function (): string {
        return "<h1>Create Post</h1>";
    })->name("create");

    Route::get("/edit", function (): string {
        return "<h1>Edit Post</h1>";
    })->name("edit");

    Route::get("/show", function (): string {
        return "<h1>Show Post</h1>";
    })->name("show");
});
