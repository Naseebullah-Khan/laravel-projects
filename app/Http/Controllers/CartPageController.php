<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function index(): View
    {
        $cart_items = Session::get("cart", []);
        $totalPrice = 0;
        foreach ($cart_items as $item) {
            $totalPrice += $item["price"] * $item["quantity"];
        }
        return view("pages.cart", compact("cart_items", "totalPrice"));
    }
}
