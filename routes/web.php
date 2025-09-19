<?php

use App\Events\NewMessage;
use App\Http\Controllers\ProfileController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', function (): View {
    return view('welcome');
});

Route::get('/dashboard', function (): View {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function (): void {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/messages", function (): View {
    return view("messages");
});

Route::get("/send-message", function (): RedirectResponse {
    $message = request()->get("message");
    $user_id = request()->get("user_id");
    event(new NewMessage($message, $user_id));
    return redirect("/messages");
})->name("send-message");

require __DIR__ . '/auth.php';
