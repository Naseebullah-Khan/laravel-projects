<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index()
    {
        // $product = Product::where("id", 2)->where("price", "<=", 26.62)->first();
        # if both of the operator is equal then you can use this approach.
        // $product = Product::where(["id" => 2, "price" => 26.62])->first();

        # if you want to search for something
        // $products = Product::where("name", "LIKE", "%Assumenda%")->get();

        # the only way that you dont get any result is when both of them fails.
        // $products = Product::where("name", "LIKE", "%Assumenda%")->orWhere("description", "LIKE", "%cupiditate%")->get();

        # we can also use whereIn method for searching multiple values but you have to search for the entire value.
        // $products = Product::whereIn("name", ["Assumenda", "Quisquam quas ratione ut voluptatem veritatis.", "Nobis", "Voluptas", "Naseeb"])->get();

        # if you want to search for products in specific range of price for example then you use whereBetween method.
        $products = Product::whereBetween("price", [200, 400])->get();
        return $products;
    }

    public function about(): View
    {
        return view("about.index");
    }
}
