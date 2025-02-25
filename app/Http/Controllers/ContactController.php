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
        ]);
    }
}
