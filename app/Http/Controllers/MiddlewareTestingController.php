<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MiddlewareTestingController extends Controller
{
    public function index(): View
    {
        return view("middlewareView.form");
    }

    public function store(Request $request): array
    {
        return $request->all();
    }
}
