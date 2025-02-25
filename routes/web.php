<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

# Routes: A route act as a mapping between a specific URL and the cross-bonding code that should be executed in response to the user request.

Route::get('/', [HomeController::class, "index"]);

Route::get("/contact", [ContactController::class, "index"])->name("contact.index");
Route::post("/contact", [ContactController::class, "store"])->name("contact.store");
