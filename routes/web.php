<?php

use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CardController::class, "show"])->name("home");
