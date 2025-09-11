<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function index(): View
    {
        $cart_items = Session::get("cart", []);
        return view("pages.cart", compact("cart_items"));
    }
}
