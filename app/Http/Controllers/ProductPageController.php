<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductPageController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        return view("pages.home", compact("products"));
    }
}
