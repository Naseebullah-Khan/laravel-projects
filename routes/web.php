<?php

use App\Events\NewMessage;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', function (): View {
    return view('welcome');
});

Route::get("messages", function (): View {
    return view("messages");
});

# in .env file if your QUEUE_CONNECTION is equal to database then you need to run the php artisan queue:work to broadcast the event
# in .env file if your QUEUE_CONNECTION is equal to sync then you don't need to run the php artisan queue:work to broadcast the event
Route::get("send-message", function (): RedirectResponse {
    $message = request()->get("message");
    event(new NewMessage($message));
    return redirect("/messages");
})->name("send-message");
