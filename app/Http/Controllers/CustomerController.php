<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $customers = Customer::all();
        // return view("customer.index", [
        //     "customers" => $customers,
        // ]);
        return view(view: "customer.index", data: compact("customers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("customer.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        $customer = new Customer();
        # in order to save the image/file first you have to check if image/file is uploaded or not because we made the image/file input nullable
        if ($request->hasFile("image")) {
            # select the image/file
            $image = $request->file("image");
            # get image/file name
            $imageName = $image->store("/", "custom_public");
            # now hardcode a path for image/file
            $imagePath = "/uploads/" . $imageName;
            # save image/file path in database
            $customer->image = $imagePath;
        }
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->bank_account_number = $request->bank_account_number;
        $customer->about = $request->about;
        $customer->save();

        return redirect()->route("customer.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $customer = Customer::findOrFail($id);
        return view("customer.edit", compact("customer"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerStoreRequest $request, string $id)
    {
        $customer = Customer::findOrFail($id);

        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $imageName = $image->store("/", "custom_public");
            $imagePath = "/uploads/" . $imageName;
            if ($customer->image == "/default-images/avatar.jpg") {
            } else {
                File::delete(public_path($customer->image));
            }
            $customer->image = $imagePath;
        }

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->bank_account_number = $request->bank_account_number;
        $customer->about = $request->about;
        $customer->save();

        return redirect()->route("customer.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
