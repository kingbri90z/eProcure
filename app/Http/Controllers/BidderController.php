<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bidder;
use App\Tender;
use App\User;
use Auth;
use Hash;
use Redirect;
class BidderController extends Controller
{
    public function storeBidder(Request $request){
        $bidder = new Bidder;
        $bidder->Name= $request->get('business_name');
        $bidder->email=$request->get('email');
        $bidder->address=$request->get('address');
        $bidder->trn=$request->get('business_trn');
        $bidder->telephone=$request->get('telephone');
        $bidder->mobile=$request->get('mobile');
        $bidder->fax=$request->get('fax');
        $bidder->password=Hash::make($request->get('password'));
//        $officer->firstname=$request->get('confirm_password');
        $bidder->save();

        $user = new User;
        $user->email=$request->get('email');
        $user->password=Hash::make($request->get('password'));
        $user->type='bidder';

        $user->save();

        return Redirect::to('/')->with('status','Account was created successfully.');
    }

    public function showTenders()
    {
        $tenders = Tender::all();

        return view('dashboard.bidder.tenders',['tenders'=>$tenders]);
    }

    public function bidderDetails(){
        $bidderDetails=Bidder::where('email','=', Auth::user()->email)->get();
        return view('dashboard.bidder.profile',['bidderDetails'=>$bidderDetails]);
    }
}
