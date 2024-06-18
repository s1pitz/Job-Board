<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Company;
use App\Models\Listing;
use App\Models\Requirement;
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
            $deleteads = DB::table('ads')->whereNull('title')->delete();

            $ads = Ad::where('company_id', $company->company_id)->get();
            return view('company.company_home', compact('ads', 'company'));
        }

        // Authentication failed, return an error response
        return redirect()->back()->withErrors([
            'password' => 'The provided credentials are incorrect.',
        ]);
    }

    public function company_home(Request $request){
        $company_id = $request->input('company_id');
        $company = Company::where('company_id', $company_id)->first();

        $deleteads = DB::table('ads')->whereNull('title')->delete();

        $ads = Ad::where('company_id', $company_id)->get();
        return view('company.company_home', compact('ads', 'company'));
    }

    public function job_create(Request $request){

        $company_id = $request->input('company_id');

        $ad = Ad::create([
            'company_id' => $company_id,
        ]);

        $selectedCategories = null;
        $requirementList = null;
        return view('company.job_create', compact('company_id', 'ad', 'selectedCategories', 'requirementList'));
    }

    public function register_ad(Request $request){

        // dd($request);

        $request->validate([
            'company_id' => 'required|int',
            'ad_title' => 'required|string',
            'description' => 'required|string',
            'company_Lower_salary' => 'required|integer',
            'company_Upper_salary' => 'required|integer',
            'enrollment' => 'required|string',
        ]);

        $ad = Ad::where('ad_id', $request->input('ad_id'))->first();

        $ad->update([
            'title' => $request->input('ad_title'),
            'description' => $request->input('description'),
            'Lower_salary' => $request->input('company_Lower_salary'),
            'Upper_salary' => $request->input('company_Upper_salary'),
            'enrollment' => $request->input('enrollment'),
        ]);

        $company_id = $request->input('company_id');
        $company = Company::where('company_id', $company_id)->first();
        $deleteads = DB::table('ads')->whereNull('title')->delete();
        $ads = Ad::where('company_id', $company_id)->get();
        return view('company.company_home', compact('ads', 'company'));
    }

    public function company_profile(Request $request){
        $company_id = $request->input('company_id');
        return view('company.company_profile');
    }

    public function add_requirement(Request $request){

        $ad_id = $request->input('ad_id');

        $alreadyExists = Requirement::where('name', $request->input('name'))->where('ad_id', $ad_id)->first();

        if($alreadyExists == null){
            Requirement::create([
                'ad_id' => $ad_id,
                'name' => $request->input('name')
            ]);
        }

        $company_id = $request->input('company_id');
        $ad = Ad::where('ad_id', $ad_id)->first();
        $selectedCategories = Category::where('ad_id', $ad_id)->get();
        $requirementList = Requirement::where('ad_id', $ad_id)->get();

        return view('company.job_create', compact('company_id', 'ad', 'selectedCategories', 'requirementList'));
    }

    public function delete_requirement(Request $request){
        // dd($request);
        $ad_id = $request->input('ad_id');
        $requirement_id = $request->input('requirement_id');

        DB::table('requirements')
            ->where('requirement_id', $requirement_id)
            ->delete();

        $company_id = $request->input('company_id');
        $ad = Ad::where('ad_id', $ad_id)->first();
        $selectedCategories = Category::where('ad_id', $ad_id)->get();
        $requirementList = Requirement::where('ad_id', $ad_id)->get();
        if($requirementList->isEmpty()){
            $requirementList = null;
        }
        return view('company.job_create', compact('company_id', 'ad', 'selectedCategories', 'requirementList'));
    }

    public function add_category(Request $request){

        $category = $request->input('category');
        $type = 0;

        if($category == 'Marketing'){
            $type = 1;
        } else if($category == 'Design'){
            $type = 2;
        } else if($category == 'Business'){
            $type = 3;
        } else if($category == 'Law'){
            $type = 4;
        } else if($category == 'Technology'){
            $type = 5;
        } else if($category == 'Administration'){
            $type = 6;
        } else if($category == 'Engineering'){
            $type = 7;
        } else if($category == 'Communications'){
            $type = 8;
        } else if($category == 'Health Care'){
            $type = 9;
        }

        // dd($type);
        $alreadyExists = Category::where('type_id', $type)->where('ad_id', $request->input('ad_id'))->first();

        if($alreadyExists == null){
            Category::create([
                'type_id' => $type,
                'name' => $category,
                'text_color' => $request->input('text_color'),
                'background_color' => $request->input('bg_color'),
                'ad_id' => $request->input('ad_id')
            ]);
        }

        $company_id = $request->input('company_id');
        $ad_id = $request->input('ad_id');

        $ad = Ad::where('ad_id', $ad_id)->first();
        $selectedCategories = Category::where('ad_id', $ad_id)->get();
        $requirementList = Requirement::where('ad_id', $ad_id)->get();
        if($requirementList->isEmpty()){
            $requirementList = null;
        }
        return view('company.job_create', compact('company_id', 'ad', 'selectedCategories', 'requirementList'));
    }
}
