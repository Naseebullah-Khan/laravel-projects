<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponseController;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\view\View;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get("/user/dashboard", function () {
    # There is two ways to get the authenticated user
    # 1. Using the auth() helper function:- we use this mostly in blade files. you can also use this in other places as well.
    # 2. Using the auth facade:- we use this mostly in controllers. you can also use this in blade files as well.
    // if (Auth::check()) {
    //     $user = Auth::user();
    //     dd($user->name);
    // } else {
    //     dd("User is not authenticated");
    // }
    return view("user.dashboard");
})->name("user.dashboard")->middleware(("auth"));

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Post Route
Route::resource("/post", PostController::class)->middleware("auth");

// Route::get("/response-one", function () {
//     // return redirect("response-two");
//     // return redirect()->route("response.two");
//     return to_route("response.two", ["name" => "Naseebullah Khan Hoshmand"]);
// })->name("response.one");

// // Route::get("/response-two/{name}", function ($name) {
// Route::get("/response-two", function () {
//     // dd($name);
//     // dd(request()); // if you have parameter in path then you don't have access to that parameter in request method
//     dd(request()->query()["name"]);
//     return "Response Two";
// })->name("response.two");

Route::get("/response", [ResponseController::class, "index"]);
Route::get("/response/create", [ResponseController::class, "create"]);

Route::get("/send-email", function (): View {
    return view("send-email");
});

Route::post("/send-email", function (Request $request): never {
    // Mail::raw($request->message, function ($mail) use ($request): void {
    //     $mail
    //         ->to($request->email)
    //         ->subject("Test Email from Laravel")
    //         ->from("nk@gmail.com");
    // });
    // dd("Email sent successfully!");

    // Recommended way to send email

    $mailContent = [
        "to" => $request->email,
        "message" => $request->message,
        "subject" => "test email from laravel",
        "from" => "nk@laravel.com",
    ];
    Mail::to($mailContent["to"])->send(new SendMail($mailContent));
    dd("Email sent successfully!");
})->name("send.email");


require __DIR__ . '/auth.php';
