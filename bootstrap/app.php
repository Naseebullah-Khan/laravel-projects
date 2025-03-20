<?php

use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(CheckRoleMiddleware::class);
        // $middleware->append(AnotherMiddleware);
        // $middleware->append(AnotherMiddleware);
        // $middleware->append(AnotherMiddleware);
        // you can add as many as you want
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
