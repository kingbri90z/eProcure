<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bidder;
use App\Tender;
use App\User;
use App\BidSubmission;
use Auth;
use Mail;
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

    public function bidSubmission($id){
        $tender=Tender::where('id','=',$id)->get()->all();
        $digits = 6;
        $company=Bidder::where('email','=', Auth::user()->email)->get(['Name']);
        $bidno=str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);

        return view('dashboard.bidder.bidsubmission',['tender'=>$tender,'company'=>$company,'bidno'=>$bidno]);
    }

    public function storeBidSubmission(Request $request)
    {
        $bid_submission = new BidSubmission;
        $bid_submission->bid_id=$request->get('bidno');
        $bid_submission->title=$request->get('title');
        $bid_submission->tender_id=$request->get('tender_id');
        $bid_submission->bidder_id=Auth::user()->id;

        $bid_submission->category=$request->get('category');
        $bid_submission->company=$request->get('company');
        $bid_submission->bid_details=$request->get('bid_details');
        $bid_submission->estimated_value=$request->get('estimatedvalue');
        $bid_submission->save();

        //Send mail if bid is within range
        $budgetallocation=Tender::where('id','=',$request->get('tender_id'))->get();
        if($budgetallocation[0]->estimated_value <= $request->get('estimatedvalue')){
            try {
                Mail::raw("Dear Procurement Officer,
             \nA Bid was created within the allocated budget for:\nBid No. : ".$request->get('bidno'). " for ". $request->get('title')." by ".$request->get('company')."\n\nSent from eProcure System", function ($message) {
                        $message->from('info@eprocure.gov.hm', 'eProcure');
                        $message->subject("Bid within Budget Allocation");
                        $message->to("eprocuregov@gmail.com");

                    });

            } catch (Exception $e) {
                echo "Oops! Something went wrong";
            }
    }

//        if($request->get('estimatedvalue')<=)
        return redirect('dashboard/bidder/tenders')->with('status', 'Your Bid was submitted successfully.');;
    }

    public function myBids(){
        $my_bids=BidSubmission::where('bidder_id','=',Auth::user()->id)->get();
        return view('dashboard/bidder/mybids')->with('mybids',$my_bids);
    }

    }
