<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SingleActionController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

# Routes: A route act as a mapping between a specific URL and the cross-bonding code that should be executed in response to the user request.

Route::get('/', [HomeController::class, "index"]);

Route::get("/about", [HomeController::class, "about"]);

Route::get("/contact", SingleActionController::class);

# Blog
# Create
# Read
# Update
# Delete
# (CRUD)

// Route::resource("/blog", BlogController::class);

Route::get("/blog", function (): string {
    $blogs = Blog::all(); # SELECT * FROM blogs
    dd($blogs);
});
