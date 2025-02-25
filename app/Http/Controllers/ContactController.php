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
        $request->validate([
            "name" => ["required", "max:20", "min:2"],
            "email" => ["required", "email"],
        ], [
            "name.required" => "Hey please fill the name field",
            "name.max" => "The max length of name have to be 20",
            "name.min" => "The min length of name have to be 2",
            "email.required" => "Hey email is required",
        ]);
    }
}
