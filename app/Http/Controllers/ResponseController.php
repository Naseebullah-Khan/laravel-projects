<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function index()
    {
        return redirect()->action([ResponseController::class, "create"], ["id" => 4]);
        // return redirect()->away('https://www.google.com'); // if user wants to go outside of application
        // return redirect()->back();
    }

    public function create()
    {
        dd("This is create method from ResponseController{}", request()->query()["id"]);
    }
}
