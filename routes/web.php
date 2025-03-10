<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/join", function () {
    # Inner Join:-> you can only make join between tables if value exits in all of the tables
    // $usersWithOrders = DB::table("users")
    //     ->join("orders", "users.id", "=", "orders.user_id")
    //     // ->select("users.*", "orders.*") # All columns of both tables
    //     ->select("users.email", "orders.product_name") # only email column from user table and product_name column from orders table
    //     ->get();

    /**
     * Outer Join:-> we have three kind of outer join
     *      1. Left Join
     *      2. Right Join
     *      3. Full Join
     */

    # 1. Left Join:-> it will fetch all of the data from first table but from the second table it will only fetched data that has a connection with the first table data
    // $usersWithOrders = DB::table("users")
    //     ->leftJoin("orders", "users.id", "=", "orders.user_id")
    //     ->select("users.name", "orders.product_name")
    //     ->get();

    # 2. Right Join:-> it will fetch all of the data from second table but from the first table it will only fetched data that has a connection with the second table data
    // $ordersWithUsers = DB::table("orders")
    //     ->leftJoin("users", "users.id", "=", "orders.user_id")
    //     ->select("orders.product_name", "users.name")
    //     ->get();

    # 3. Full Join:-> it will fetched all data from both of the table
    ## unionAll()-> get all data even if data is duplicate.
    ## union()-> get all data without duplicate
    $usersWithOrdersAndOrdersWithUsers = DB::table("users")
        ->leftJoin("orders", "users.id", "=", "orders.user_id")
        ->select("users.name", "orders.product_name")
        ->unionAll(
            DB::table("users")
                ->rightJoin("orders", "users.id", "=", "orders.user_id")
                ->select("users.name", "orders.product_name")
        )->get();

    dd($usersWithOrdersAndOrdersWithUsers);
});
