<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Models\Ad;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserAuthenticatorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {

    if(Auth::guest()){
        $availableads = DB::table('ads')
        ->join('companies', 'ads.company_id', '=', 'companies.company_id')
        ->get();

        $activeads = NULL;
        $successfull = false;
        return view('index', compact('availableads', 'activeads', 'successfull'));

    } else {

        $availableads = DB::table('ads')
        ->join('companies', 'ads.company_id', '=', 'companies.company_id')
        ->leftJoin('listings', function($join) {
            $join->on('ads.ad_id', '=', 'listings.ad_id')
                ->where('listings.user_id', '=', Auth::id());
        })
        ->whereNull('listings.ad_id')
        ->select('ads.*', 'companies.*')
        ->get();

        $activeads = DB::table('ads')
        ->join('companies', 'ads.company_id', '=', 'companies.company_id')
        ->join('listings', 'ads.ad_id', '=', 'listings.ad_id')
        ->where('listings.user_id', Auth::id())
        ->select('ads.*', 'companies.*', 'listings.*')
        ->get();

        $successfull = false;
        return view('index', compact('availableads', 'activeads', 'successfull'));
    }
})->name('home');

Route::post('/', [HomeController::class, 'create_listing'])->name('create_listing');

Route::get('/login', [UserAuthenticatorController::class, 'login'])->name('login');
Route::get('/register', [UserAuthenticatorController::class, 'register'])->name('register');

Route::post('/login', [UserAuthenticatorController::class, 'auth_login'])->name('user_login');
Route::post('/register', [UserAuthenticatorController::class, 'auth_register'])->name('user_register');
Route::post('logout', [UserAuthenticatorController::class, 'auth_logout'])->name('user_logout');

Route::get('company', [CompanyController::class, 'company'])->name('company');
Route::get('company_register', [CompanyController::class, 'company_register'])->name('company_register');
Route::post('company_home', [CompanyController::class, 'company_home'])->name('company_home');
Route::post('company_register', [CompanyController::class, 'auth_register'])->name('auth_register');
Route::post('company_login', [CompanyController::class, 'auth_login'])->name('auth_login');
Route::post('company_profile', [CompanyController::class, 'company_profile'])->name('company_profile');

Route::post('job_create', [CompanyController::class, 'job_create'])->name('job_create');
Route::post('register_ad', [CompanyController::class, 'register_ad'])->name('register_ad');
Route::post('add_requirement', [CompanyController::class, 'add_requirement'])->name('add_requirement');
Route::post('delete_requirement', [CompanyController::class, 'delete_requirement'])->name('delete_requirement');
Route::post('add_category', [CompanyController::class, 'add_category'])->name('add_category');

