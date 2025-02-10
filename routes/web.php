<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get("test", function () {
    $job = Job::first();
    TranslateJob::dispatch($job);
    return "Done";
});

Route::view("/", "home");
Route::view('/contact', "contact");

// Route::resource("/jobs", JobController::class);
Route::get("/jobs", [JobController::class, "index"]);

Route::get("/jobs/create", [JobController::class, "create"])
    ->middleware("auth");

Route::post("/jobs", [JobController::class, "store"])->middleware("auth");
Route::get("/jobs/{job}", [JobController::class, "show"]);

Route::patch("/jobs/{job}", [JobController::class, "update"])
    ->middleware("auth");

Route::post("/jobs/{job}", [JobController::class, "destroy"])
    ->middleware("auth");

Route::get("/jobs/{job}/edit", [JobController::class, "edit"])
    ->middleware("auth")
    ->can("edit", "job");

// Auth Routes
Route::get("/register", [RegisteredUserController::class, "create"]);
Route::post("/register", [RegisteredUserController::class, "store"]);
Route::get("/login", [SessionController::class, "create"]);
Route::post("/login", [SessionController::class, "store"]);
Route::post("/logout", [SessionController::class, "destroy"]);
