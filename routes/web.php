<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CustomerController::class, "index"])->name("customer.index");
Route::get("/create", [CustomerController::class, "create"])->name("customer.create");
Route::post("/", [CustomerController::class, "store"])->name("customer.store");
