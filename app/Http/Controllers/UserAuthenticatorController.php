<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticatorController extends Controller
{
    //
    public function login()
    {
        return view('UserAuth.user_login');
    }

    public function register()
    {
        return view('UserAuth.user_register');
    }

    public function auth_login(Request $request){

        if(Auth::attempt([
            "email" => $request->input('email'),
            "password" => $request->input('password')
        ], $request->input('remember'))){
            $request->session()->regenerate();
            return redirect()->route('home');
        };
        return redirect()->back()->withErrors([
            "error" => "Invalid credentials"
        ]);
    }

    public function auth_register(Request $request){

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return redirect()->route('login');
    }

    public function auth_logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
