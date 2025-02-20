<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

# Routes: A route act as a mapping between a specific URL and the cross-bonding code that should be executed in response to the user request.

Route::get('/', [HomeController::class, "index"]);

Route::get("/about", [HomeController::class, "about"]);
