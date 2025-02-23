<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    public function index(): Collection
    {
        // $product = Product::findOrFail(4);
        // $product->delete();

        # if you want to retrieve all products including the deleted ones, you should chain withTrashed method.
        // $products = Product::withTrashed()->get();

        # if you want to retrieve only the deleted products, you should chain onlyTrashed method.
        $products = Product::onlyTrashed()->get();

        return $products;
    }

    public function about(): View
    {
        return view("about.index");
    }
}
