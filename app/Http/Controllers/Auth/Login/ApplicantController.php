<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    protected $redirectTo = '/employee/home';

    public function username()
    {
        return 'email';
    }
    protected function guard()
    {
        return Auth::guard('applicants');
    }
}
