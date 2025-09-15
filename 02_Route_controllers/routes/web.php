<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

// about page route inertia helper
Route::get('/about', function () {
    return inertia('About');
});

// user profile route get(uri, blade, data)
Route::inertia('user', 'Users', ['username' => 'JohnDoe']);

Route::get('/profile', [UserController::class, 'index']);