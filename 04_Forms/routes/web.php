<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', [
        'user' => Auth::user()
    ]);
})->name('home');

// about page route inertia helper
Route::get('/about', function () {
    return inertia('About');
});

// user profile route get(uri, blade, data)
Route::inertia('users', 'Users', ['username' => 'JohnDoe']);

Route::get('/profile', [UserController::class, 'index']);

Route::inertia('/register', 'Auth/RegisterWithForm')->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/update-profile', [UserController::class, 'updateAvatar'])->name('update-profile');