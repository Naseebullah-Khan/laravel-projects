<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function index()
    {
        // return response()->json(["name" => "Nasebullah Khan Hohmand", "position" => "SE"]); // Json format
        // or
        // return ["name" => "Nasebullah Khan Hohmand", "position" => "SE"]; // Json format
        // return response()->download(public_path('uploads/Screenshot 2025-06-02 161216.png')); // Download file
        return response()->file(public_path('uploads/Screenshot 2025-06-02 161216.png')); // view file
    }

    public function create()
    {
        dd("This is create method from ResponseController{}", request()->query()["id"]);
    }
}
