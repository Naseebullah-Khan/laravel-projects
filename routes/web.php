<?php

use App\Http\Controllers\SampleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("test", SampleController::class);

Route::get("service-container", function () {
    // dd(app()->make("first_class"));
    dd(app()->make("test_service"));
});
