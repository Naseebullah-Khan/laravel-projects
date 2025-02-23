<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index()
    {
        // $product = Product::findOrFail(3)->forceDelete(); # permanently delete the product
        // $product = Product::findOrFail(3)->delete(); # soft delete the product

        // $product = Product::withTrashed()->findOrFail(3)->restore(); # restore the soft deleted product
        $product = Product::withTrashed()->findOrFail(3)->forceDelete(); # permanently delete the soft deleted product

        return $product;
    }

    public function about(): View
    {
        return view("about.index");
    }
}
