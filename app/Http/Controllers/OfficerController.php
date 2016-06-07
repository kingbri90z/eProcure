<?php

namespace App\Http\Controllers;
use App\Officer;
use App\User;
use App\Tender;
use Auth;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use Redirect;

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
//        dd($request->get('email'),$request->get('password'));

         if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
             if (Auth::user()->type == "officer") {
                 //dd(1);

                 return redirect()->intended('dashboard/officer');
             } elseif (Auth::user()->type == "bidder") {
                // dd(2);

                 return redirect()->intended('dashboard/bidder');
             }
         }else{
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
        $tender = new Tender;
        $tender->title= $request->get('title');
//        $tender->entity=$request->get('entity');
        $tender->open_date=$request->get('open_date');
        $tender->close_date=$request->get('close_date');
        $tender->classification=$request->get('classification');
        $tender->comments=$request->get('comments');
        $tender->state=$request->get('state');
//        $officer->firstname=$request->get('confirm_password');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
