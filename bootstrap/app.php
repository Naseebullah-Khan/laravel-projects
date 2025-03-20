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
        // $middleware->append(CheckRoleMiddleware::class);
        // // $middleware->append(AnotherMiddleware);
        // // $middleware->append(AnotherMiddleware);
        // // $middleware->append(AnotherMiddleware);
        // // you can add as many as you want
    
        # If you want to group middlewares in to one middleware you do it like this
        // $middleware->appendToGroup("test-group", [
        //     CheckRoleMiddleware::class,
        //     // AnotherMiddleware
        //     // AnotherMiddleware
        //     // AnotherMiddleware
        // ]);
    
        # If you want to add a middleware or middlewares to default middleware of laravel like web or api middleware then you do it like this
        // $middleware->web(append: [
        //     CheckRoleMiddleware::class,
        //     //     // AnotherMiddleware
        //     //     // AnotherMiddleware
        //     //     // AnotherMiddleware
        // ]);
        // // --------------------------------------------
        // // $middleware->api(append: [
        // //     CheckRoleMiddleware::class,
        // //     //     // AnotherMiddleware
        // //     //     // AnotherMiddleware
        // //     //     // AnotherMiddleware
        // // ]);
    
        # If you want to add alias or name to middleware then you do it like this
        $middleware->alias([
            "checkRole" => CheckRoleMiddleware::class,
            // "middlewareName"=>AnotherMiddleware,
            // "middlewareName"=>AnotherMiddleware,
            // "middlewareName" => AnotherMiddleware,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
