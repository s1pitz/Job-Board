<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function create_listing(Request $request)
    {
        $fileCV = $request->file('fileCV');
        $filePorto = $request->file('filePortofolio');

        $fileNameCV = time() . "_" . $fileCV->getClientOriginalName();
        $fileNamePortofolio = time() . "_" . $filePorto->getClientOriginalName();
        $fileCV->move(public_path("files"), $fileNameCV);
        $filePorto->move(public_path("files"), $fileNamePortofolio);

        $userId = Auth::id();

        Listing::create([
            'cv' => $fileNameCV,
            'portofolio' => $fileNamePortofolio,
            'ad_id' => $request->input('ad_id'),
            'user_id' => $userId,
        ]);

        $successfull = true;
        $companies = DB::table('companies')
            ->join('ads', 'companies.company_id', '=', 'ads.company_id')
            ->get();

        return view('index', compact('companies','successfull'));

        // return dd($request);
    }
}
