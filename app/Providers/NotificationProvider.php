<?php

namespace App\Providers;

use App\Services\NotificationService;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

class NotificationProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // app()->singleton(NotificationService::class, function () {
        //     return new NotificationService();
        // });

        $this->app->singleton(NotificationService::class, function () {
            return new NotificationService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->alias(NotificationService::class, "Notification");
    }
}
