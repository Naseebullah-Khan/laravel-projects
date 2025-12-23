<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', "verified"])->group(function () {
    Route::get("/dashboard", [NoteController::class, "index"])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post("/note/setAppearance", [NoteController::class, "setAppearance"])->name("note.setAppearance");
    Route::get("notes/archived", [NoteController::class, "archivedNotes"])->name("notes.archived");
    Route::get("notes/put-archived/{note}", [NoteController::class, "putArchived"])->name("notes.put-archived");
    Route::resource("note", NoteController::class);
});

require __DIR__ . '/auth.php';
