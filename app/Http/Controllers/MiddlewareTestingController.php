<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class MiddlewareTestingController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        // return [new Middleware(CheckRoleMiddleware::class, except: ["index"])];
        return [new Middleware(CheckRoleMiddleware::class, only: ["store"])];
    }

    public function index(): View
    {
        return view("middlewareView.form");
    }

    public function store(Request $request): array
    {
        return $request->all();
    }
}
