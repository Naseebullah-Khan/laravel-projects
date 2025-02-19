<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;

# Routes: A route act as a mapping between a specific URL and the cross-bonding code that should be executed in response to the user request.

Route::get('/', function (): View {
    return view('welcome');
    // return "Hello, World!";
});

# Route Methods
/**
 * 1. GET -> get data.
 * 2. POST -> submit or store data.
 * 3. PUT -> update whole data.
 * 4. PATCH -> update a portion of data.
 * 5. DELETE -> delete the data.
 * 6. OPTIONS -> not gonna use it.
 */

Route::get("get-data", function (): void {
    return;
});

Route::post("post-data", function (): void {
    return;
});

Route::put("put-data", function (): void {
    return;
});

Route::patch("patch-data", function (): void {
    return;
});

Route::delete("delete-data", function (): void {
    return;
});
