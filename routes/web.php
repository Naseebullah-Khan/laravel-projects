<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/join", function () {
    $usersWithOrders = DB::table("users")
        ->join("orders", "users.id", "=", "orders.user_id")
        // ->select("users.*", "orders.*") # All columns of both tables
        ->select("users.email", "orders.product_name") # only email column from user table and product_name column from orders table
        ->get();

    dd($usersWithOrders);
});
