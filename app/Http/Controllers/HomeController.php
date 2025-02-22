<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(): float
    {
        # Aggregate Method count
        // $totalProducts = DB::table("products")->count();
        // return $totalProducts;

        # Aggregate Method max
        // $maxProductPrice = DB::table("products")->max("price");
        // return $maxProductPrice;

        # Aggregate Method min
        // $minProductPrice = DB::table("products")->min("price");
        // return $minProductPrice;

        # Aggregate Method sum
        // $sumOfProductsPrice = DB::table("products")->sum("price");
        // return $sumOfProductsPrice;

        # Aggregate Method avg
        $averageProductsPrice = DB::table("products")->avg("price");
        return $averageProductsPrice;
    }

    public function about(): View
    {
        return view("about.index");
    }
}
