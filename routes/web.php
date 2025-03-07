<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get("/trash", [CustomerController::class, "showTrashedData"])->name("customer.showTrashedData");
Route::post("/restore/{id}", [CustomerController::class, "restore"])->name("customer.restore");
Route::delete("/forceDelete/{id}", [CustomerController::class, "forceDestroy"])->name("customer.forceDestroy");
Route::get('/', [CustomerController::class, "index"])->name("customer.index");
Route::get("/create", [CustomerController::class, "create"])->name("customer.create");
Route::post("/", [CustomerController::class, "store"])->name("customer.store");
Route::get("/{id}/edit", [CustomerController::class, "edit"])->name("customer.edit");
Route::put("/{id}", [CustomerController::class, "update"])->name("customer.update");
Route::get("/{id}", [CustomerController::class, "show"])->name("customer.show");
Route::delete("/{id}", [CustomerController::class, "destroy"])->name("customer.destroy");
