<?php

namespace App\Http\Controllers;
use App\Officer;
use App\User;
use App\BidSubmission;
use App\Tender;
use App\Bidder;
use App\Contract;
use App\BidEvaluation;

use Auth;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Input;

use Hash;
use App\Http\Requests;
use Redirect;
use DB;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeOfficer(Request $request)
    {
        $officer = new Officer;
        $officer->firstname= $request->get('firstname');
        $officer->lastname=$request->get('lastname');
        $officer->gender=$request->get('optionsRadios');
        $officer->email=$request->get('work_email');
        $officer->work_phone=$request->get('work_phone');
        $officer->employee_id=$request->get('empID');
        $officer->password=Hash::make($request->get('password'));
//        $officer->firstname=$request->get('confirm_password');
        $officer->save();

        $user = new User;
        $user->email=$request->get('work_email');
        $user->password=Hash::make($request->get('password'));
        $user->type='officer';
        $user->save();

        return Redirect::to('/')->with('status','Account was created successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
         if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'status'=>'A'])) {

             if (Auth::user()->type == "officer") {
                 //dd(1);

                 return redirect()->intended('officer/dashboard');
             } elseif (Auth::user()->type == "bidder") {
                // dd(2);

                 return redirect()->intended('dashboard/bidder');
             }
         }elseif($request->get('email')=='admin@eprocure.gov.jm' AND $request->get('password')=='12345'){

             return redirect()->intended('dashboard/admin');
         }

         else{
             return redirect('/')->withErrors('Username or Password was incorrect!');
         }

    }

    public function logout(){
            Auth::logout();
        return redirect()->intended('/');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTender(Request $request)
    {
        $procurement_method = '';
        if ($request->get('budgetallocation') <= 500000) {
            $procurement_method = 'Direct Contracting';
        } else
            if (($request->get('budgetallocation')) >= 1500000 AND $request->get('budgetallocation') <= 5000000) {
                $procurement_method = 'Limited Tender';
            } else
                if (($request->get('budgetallocation')) >= 5000000 AND ($request->get('budgetallocation')) <= 15000000) {
                    $procurement_method = 'Local Competitive Bidding';
                } else
                    if (($request->get('budgetallocation')) >= 15000000 AND ($request->get('budgetallocation')) >= 40000000) {
                        $procurement_method = 'International Competitive Bidding or Local Competitive Bidding';
                    }else
                        if(($request->get('budgetallocation')) >= 40000000 AND ($request->get('budgetallocation')) >= 150000000){
                        $procurement_method = 'International Competitive Bidding or Local Competitive Bidding';

    }

        $tender = new Tender;
        $tender->title= $request->get('title');
//        $tender->entity=$request->get('entity');
        $tender->open_date=$request->get('open_date');
        $tender->close_date=$request->get('close_date');
        $tender->classification=$request->get('classification');
        $tender->comments=$request->get('comments');
//        $tender->state=$request->get('state');
        $tender->budgetallocation=$request->get('budgetallocation');
        $tender->description=$request->get('description');
        $tender->procurement_method=$procurement_method;
        $tender->save();
        return redirect('dashboard/officer/tenders')->with('status','Tender was created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTenders()
    {
        $tenders = Tender::all();

        return view('dashboard.officer.tenders',['tenders'=>$tenders]);
    }

    public function officerDetails(){
        $officerDetails=Officer::where('email','=', Auth::user()->email)->get();
        return view('dashboard.officer.profile',['officerDetails'=>$officerDetails]);
    }

    public function showContracts(){

//        =Contract::all();
        $contracts=DB::table('contracts')
            ->join('bidsubmissions', 'contracts.bid_id', '=', 'bidsubmissions.bid_id')
            ->get();

        return view('dashboard.officer.contracts',['contracts'=>$contracts]);
    }

    public function viewBids(){
        $bids=BidSubmission::all();
        $bid_evaluation_decision=null;
        $count=0;
        foreach($bids as $bid){

            $bid_evaluation_decision=BidEvaluation::where('bid_id','=',$bid->bid_id)->first();
            if(isset($bid_evaluation_decision)) {

                // $bids[$count]->put('decision',$bid_evaluation_decision);
                $bids[$count]->decision = $bid_evaluation_decision->decision;
                //Reset bid evaluation decision value
                if ($bid_evaluation_decision != null) {
                    $bid_evaluation_decision = null;
                }
            }
            $count++;
        }
        return view('dashboard.officer.viewbids',['bids'=>$bids]);
    }

    public function evaluateBid($id){
        $want=Tender::where('id','=',$id)->get(['description']);
        $offer=BidSubmission::where('tender_id','=',$id)->get(['bid_details','bid_id','bidder_id']);
dd($offer);
        return view('dashboard.officer.bidevaluation',['want'=>$want,'offer'=>$offer]);
    }

    public function storeBidEvaluation(Request $request){
        $bid_evaluations= new BidEvaluation;
        $bid_evaluations->comment=$request->get('comment');
        $bid_evaluations->decision=$request->get('bidevalRadios');
        $bid_evaluations->bid_id=$request->get('bid_id');
        $bid_evaluations->bidder_id=$request->get('bidder_id');
        $bid_evaluations->save();

        return redirect::to('officer/viewbids')->with('status','Bid evaluation was successful.');
    }

    public function generateContract($id){
        $contract_data=BidSubmission::where('bid_id','=',$id)->get();

        return view('dashboard.officer.generatecontract',['contract_data'=>$contract_data]);

    }

    public function reports()
    {

        return view('dashboard.officer.reports');

    }
        public function generateContractPDF(Request $request){
        $contract_data=$request->all();
        $contract = new Contract;
        $contract->bid_id = $request->get('bid_no');
        $contract->contract_open_date = $request->get('contract_start');
        $contract->contract_close_date = $request->get('contract_end');
        $contract->contract_note = $request->get('contract_note');
        $contract->save();
//dd($contract_data);
        $pdf = PDF::loadView('dashboard.officer.loadcontractpdf',$contract_data);
        return $pdf->stream('contract.pdf');
    }


        public function createContract(){
            $bids = Db::table('bidsubmissions');
//    $bid_evaluation_decision=null;
//    $count=0;
//    foreach($bids as $bid){
//
//        $bid_evaluation_decision=BidEvaluation::where('bid_id','=','Yes')->first();
//        if(isset($bid_evaluation_decision)) {
//
//            // $bids[$count]->put('decision',$bid_evaluation_decision);
//            $bids[$count]->decision = $bid_evaluation_decision->decision;
//            //Reset bid evaluation decision value
//            if ($bid_evaluation_decision != null) {
//                $bid_evaluation_decision = null;
//            }
//        }
//        $count++;
//    }
//            //$bids=$bids->where('decision','Yes')->all();
//            dd($bids);
            $bids->join('bidevaluations', 'bidevaluations.bid_id', '=', 'bidsubmissions.bid_id')
            ->where('bidevaluations.decision','=','Yes');
            $bids=$bids->get();
    return view('dashboard.officer.createcontract',['bids'=>$bids]);

}

    public function generateReport(Request $request){
//        isset($request->all()['bid_title']));

        $query = Db::table('bidsubmissions');

        // Adds conditional join and where
        if((Input::has('bid_start_range'))AND Input::has('bid_end_range')){
//            $query->join('categories', 'categories.id', '=', 'post.category_id')
            $query->whereBetween('bidsubmissions.estimated_value',
                [$request->all()['bid_start_range'],$request->all()['bid_end_range']]);
        }

        if((Input::has('classification'))){
//            $query->join('categories', 'categories.id', '=', 'post.category_id')
            $query->where('bidsubmissions.category','=',$request->all()['classification']);
        }

        if((Input::has('bid_title'))){
//            $query->join('categories', 'categories.id', '=', 'post.category_id')
            $query->where('bidsubmissions.title','LIKE','%'.$request->all()['bid_title'].'%');
        }

        if((Input::has('bid_start_date')) AND (Input::has('bid_end_date')) ){
            $query->join('tenders', 'tenders.id', '=', 'bidsubmissions.tender_id')
//            ->where('tenders.open_date','=>',date($request->all()['bid_start_date']))
                ->where('tenders.open_date','>=',date($request->all()['bid_start_date']))

            ->where('tenders.close_date','<=',date($request->all()['bid_end_date']));
        }

        if((Input::has('bidder_email'))){
            $query->join('users', 'users.id', '=', 'bidsubmissions.bidder_id')
            ->where('users.email','LIKE','%'.$request->all()['bidder_email'].'%');
        }

        if((Input::has('bidder_trn'))){
            $query->join('users', 'users.id', '=', 'bidsubmissions.bidder_id')
            ->join('bidders', 'bidders.email', '=', 'users.email')
                ->where('bidders.trn','=',$request->all()['bidder_trn']);
        }

        if((Input::has('contract_open_date')) AND (Input::has('contract_close_date')) ){
            $query->join('contracts', 'contracts.bid_id', '=', 'bidsubmissions.bid_id')
//            ->where('tenders.open_date','=>',date($request->all()['bid_start_date']))
                ->where('contracts.contract_open_date','>=',date($request->all()['contract_open_date']))

                ->where('contracts.contract_close_date','<=',date($request->all()['contract_close_date']));
        }

        if((Input::has('bidder_join_from')) AND (Input::has('bidder_join_to')) ){
            $query->join('users', 'users.id', '=', 'bidsubmissions.bidder_id')
                ->join('bidders', 'bidders.email', '=', 'users.email')
                ->where('bidders.created_at','>=',date($request->all()['bidder_join_from']))
                ->where('bidders.created_at','<=',date($request->all()['bidder_join_to']));
        }

        $report_result=$query->get();
//        dd($report_result);

        return view('dashboard.officer.reportresult',['report_result'=>$report_result]);

    }

    public function dashboard(){
        $dashboard_data=array();
        $bidders_count=Bidder::all()->count();
        $officers_count=Officer::all()->count();
        $no_of_bids=BidSubmission::all()->count();
        $no_of_contracts=Contract::all()->count();
        $dashboard_data=array($bidders_count,$officers_count,$no_of_bids,$no_of_contracts);
return view('dashboard.officer.dashboard',['dashboard_data'=>$dashboard_data]);
    }
}
