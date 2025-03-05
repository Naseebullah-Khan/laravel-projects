<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CustomerController::class, "index"])->name("customer.index");
Route::get("/create", [CustomerController::class, "create"])->name("customer.create");
Route::post("/", [CustomerController::class, "store"])->name("customer.store");
Route::get("/{id}/edit", [CustomerController::class, "edit"])->name("customer.edit");
Route::put("/{id}", [CustomerController::class, "update"])->name("customer.update");
Route::get("/{id}", [CustomerController::class, "show"])->name("customer.show");
