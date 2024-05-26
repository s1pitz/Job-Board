<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function company(Request $request)
    {
        return view('company.company_login');
    }

    public function company_register()
    {
        return view('company.company_register');
    }

    public function auth_register(Request $request){

        $request->validate([
            'company_name' => 'required|string',
            'company_email' => 'required|email',
            'company_password' => 'required|string',
            'company_address' => 'required|string',
            'company_phone' => 'required|string'
        ]);

        Company::create([
            'name' => $request->input('company_name'),
            'email' => $request->input('company_email'),
            'password' => $request->input('company_password'),
            'Address' => $request->input('company_address'),
            'phone' => $request->input('company_phone')
        ]);

        return redirect()->route('company');
    }

    public function auth_login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Attempt to find the user by username
        $company = Company::where('email', $request->email)->first();

        // Check if the company exists
        if (!$company) {
            return redirect()->back()->withErrors([
                'password' => 'The provided credentials are incorrect. LOL',
            ]);
        }

        // Check if the password is correct
        if(Hash::check($request->password, $company->password)){
            // Authentication successful, login the company
            // Redirect to the desired route
            return redirect()->route('company_home');
        }

        // Authentication failed, return an error response
        return redirect()->back()->withErrors([
            'password' => 'The provided credentials are incorrect.',
        ]);
    }

    public function company_home(){
        return view('company.company_home');
    }
}
