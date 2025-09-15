<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddToCartController extends Controller
{
    public $cart = [];

    public function __construct()
    {
        $this->cart = Session::get("cart", []);
    }

    public function store(Request $request, $id): array
    {
        $product = Product::findOrFail($id);

        $this->cart[$product->id] = [
            "id" => $product->id,
            "name" => $product->name,
            "image" => $product->image,
            "price" => $product->price,
            "color" => $request->color,
            "quantity" => $request->quantity,
        ];

        Session::put("cart", $this->cart);

        return [
            "status" => "success",
            "message" => "Product added to cart successfully.",
            "cartCount" => count($this->cart),
        ];
    }

    public function destroy($id): RedirectResponse
    {
        unset($this->cart[$id]);
        Session::put("cart", $this->cart);
        notyf()->success('Product removed from cart successfully.');
        return redirect()->back();
    }

    public function updateQuantity(Request $request): array
    {
        $cart_items = $this->cart;
        $cart_items[$request->id]["quantity"] = $request->quantity;
        Session::put("cart", $cart_items);
        notyf()->success('Product quantity updated successfully.');
        return [
            "status" => "success",
        ];
    }
}
