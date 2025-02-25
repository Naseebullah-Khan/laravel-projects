<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class ContactController extends Controller
{
    public function index(): View
    {
        return view("contact.index");
    }

    public function store(Request $request)
    {
        // dd(request()->all()); # using request() helper function to get the request data
        // dd($request->all()); # using Request class to get the request data and this is the recommended way
        // dd($request->name); # getting the name field from the request data
        dd($request->input("email")); # getting the name field from the request data
    }
}
