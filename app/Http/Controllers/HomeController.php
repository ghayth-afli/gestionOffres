<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Offer;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $nbUsers=User::count();
        $nbOffer=Offer::count();
        $nbOfferAcc=Offer::where('status','Available')->count();
        $nbOfferRef=Offer::where('status','Not Available')->count();
        return view('home', ['nbUsers' =>   $nbUsers ,'nbOffer' =>   $nbOffer  ,'nbOfferAcc' =>   $nbOfferAcc ,'nbOfferRef' =>   $nbOfferRef]);       
    }
}
