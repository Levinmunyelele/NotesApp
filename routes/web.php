<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController; 
use Illuminate\Support\Facades\Auth; 

// Default welcome route
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes (login, register, etc.) provided by Laravel Breeze
require __DIR__.'/auth.php'; // This line is added by Breeze to include auth routes

// Route for the home dashboard after login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Notes management routes, protected by 'auth' middleware
// This means only logged-in users can access these routes
Route::middleware(['auth'])->group(function () {
    Route::resource('notes', NoteController::class); // Provides all CRUD routes for notes
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
