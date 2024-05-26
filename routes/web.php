<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserAuthenticatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', [UserAuthenticatorController::class, 'login'])->name('login');
Route::get('/register', [UserAuthenticatorController::class, 'register'])->name('register');
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');

Route::post('/login', [UserAuthenticatorController::class, 'auth_login'])->name('user_login');
Route::post('/register', [UserAuthenticatorController::class, 'auth_register'])->name('user_register');
Route::post('logout', [UserAuthenticatorController::class, 'auth_logout'])->name('user_logout');
