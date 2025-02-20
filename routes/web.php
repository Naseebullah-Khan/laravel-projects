<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;

# Routes: A route act as a mapping between a specific URL and the cross-bonding code that should be executed in response to the user request.

Route::get('/', function (): View {
    $title = "This is Home Page!";
    return view('welcome', ["title" => $title]);
    // return "Hello, World!";
});

Route::get("/about", function (): View {
    $books = ["Steal like a artist", "Story book", "48 Laws of Power"];
    return view("about.index", ["title" => "This is About page!", "books" => $books]);
});

Route::get("/contact", function (): View {
    $title = "This is Contact page!";
    return view("contact.index", ["title" => $title]);
});
