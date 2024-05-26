<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
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

Route::get('company', [CompanyController::class, 'company'])->name('company');
Route::get('company_register', [CompanyController::class, 'company_register'])->name('company_register');
Route::get('company_home', [CompanyController::class, 'company_home'])->name('company_home');
Route::post('company_register', [CompanyController::class, 'auth_register'])->name('auth_register');
Route::post('company_login', [CompanyController::class, 'auth_login'])->name('auth_login');

Route::post('job_create', [CompanyController::class, 'job_create'])->name('job_create');
Route::post('register_ad', [CompanyController::class, 'register_ad'])->name('register_ad');
