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

        return view('index', compact('companies','availableads', 'activeads', 'successfull'));

        // return dd($request);
    }
}
