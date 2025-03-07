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
    public function index(Request $request): View
    {
        $customers = Customer::when($request->has("search"), function ($q) use ($request) {
            return $q
                ->where("first_name", "LIKE", "%$request->search%")
                ->orWhere("last_name", "LIKE", "%$request->search%")
                ->orWhere("email", "LIKE", "%$request->search%")
                ->orWhere("phone", "LIKE", "%$request->search%");
        })->orderBy("id", $request->has("order") && $request->order == "asc" ? "ASC" : "DESC")->get();

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
        $customer = Customer::findOrFail($id);

        return view("customer.show", compact("customer"));
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
        $customer = Customer::findOrFail($id);

        # we have to comment out this part because of soft delete feature

        // if ($customer->image == "/default-images/avatar.jpg") {
        // } else {
        //     File::delete(public_path($customer->image));
        // }

        $customer->delete();

        return redirect()->route("customer.index");

    }

    /**
     * Display a listing of the trashed resource.
     */
    public function showTrashedData(Request $request): View
    {
        $customers = Customer::onlyTrashed()
            ->when($request->has("search"), function ($q) use ($request) {
                return $q->where(function ($subQuery) use ($request) {
                    $subQuery->where("first_name", "LIKE", "%$request->search%")
                        ->orWhere("last_name", "LIKE", "%$request->search%")
                        ->orWhere("email", "LIKE", "%$request->search%")
                        ->orWhere("phone", "LIKE", "%$request->search%");
                });
            })
            ->orderBy("id", $request->has("order") && $request->order == "asc" ? "ASC" : "DESC")
            ->get();


        return view("customer.trash", compact("customers"));
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(string $id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->restore();

        return redirect()->back();
    }

    /**
     * Force delete the specified resource from storage.
     */
    public function forceDestroy(string $id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);

        if ($customer->image == "/default-images/avatar.jpg") {
        } else {
            File::delete(public_path($customer->image));
        }

        $customer->forceDelete();

        return redirect()->back();
    }
}
