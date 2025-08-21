<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::all();
        return view("admin.dashboard", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("admin.product.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $product = new Product();
        // insert thumbnail image
        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $image_name = $image->store("", "public");
            $image_path = "/uploads/" . $image_name;
            $product->image = $image_path;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->short_description = $request->short_description;
        $product->quantity = $request->quantity;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->save();

        // insert colors
        if ($request->has("colors") && $request->filled("colors")) {
            foreach ($request->colors as $color) {
                ProductColor::create(["product_id" => $product->id, "name" => $color]);
            }
        }

        // insert other images
        if ($request->hasFile("images")) {
            foreach ($request->images as $image) {
                $image_name = $image->store("", "public");
                $image_path = "/uploads/" . $image_name;
                ProductImage::create(attributes: [
                    "product_id" => $product->id,
                    "path" => $image_path,
                ]);
            }
        }

        return redirect()->route("products.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $product = Product::findOrFail($id);
        return view("admin.product.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $product = Product::with("colors", "images")->findOrFail($id);
        $colors = $product->colors->pluck("name")->toArray();
        $images = $product->images->pluck("path")->toArray();
        return view("admin.product.edit", compact("product", "colors", "images"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        if ($request->hasFile("image")) {
            File::delete(public_path($product->image)); // delete old image if exists
            $image = $request->file("image");
            $image_name = $image->store("", "public");
            $image_path = "/uploads/" . $image_name;
            $product->image = $image_path;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->short_description = $request->short_description;
        $product->quantity = $request->quantity;
        $product->sku = $request->sku;
        $product->description = $request->description;
        $product->update();

        if ($request->has("colors") && $request->filled("colors")) {
            // Delete existing colors
            foreach ($product->colors as $color) {
                $color->delete();
            }
            // Insert new colors
            foreach ($request->colors as $color) {
                ProductColor::create(["product_id" => $product->id, "name" => $color]);
            }
        }

        // insert other images
        if ($request->hasFile("images")) {
            foreach ($product->images as $image) {
                File::delete(public_path($image->path)); // delete old images if exists
                $image->delete(); // delete old images
            }
            foreach ($request->images as $image) {
                $image_name = $image->store("", "public");
                $image_path = "/uploads/" . $image_name;
                ProductImage::create(attributes: [
                    "product_id" => $product->id,
                    "path" => $image_path,
                ]);
            }
        }

        return redirect()->route("products.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        // Delete thumbnail image
        File::delete(public_path($product->image));

        // Delete other images
        if ($product->images) {
            // Delete each image file
            foreach ($product->images as $image) {
                File::delete(public_path($image->path));
            }
        }

        // Finally delete the product
        $product->delete();

        return redirect()->route("products.index");
    }
}
