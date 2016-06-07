<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('register/bidder', function () {
    return view('bidder.registration');
});

Route::get('login', function () {
   // dd(Auth::user());
    return view('login');
});

Route::get('register/officer', function () {
    return view('officer.registration');
});

Route::get('dashboard/bidder', function () {
    return redirect('dashboard/bidder/tenders');
});

Route::get('officer/viewbids', function () {
    return view('dashboard.officer.viewbids');
});

Route::get('bidder/mybids', function () {
    return view('dashboard.bidder.mybids');
});

Route::get('dashboard/officer', function () {
    return redirect('dashboard/officer/tenders');
});

Route::get('dashboard/officer/tenders', [
//    'middleware' => 'auth',
    'uses' => 'OfficerController@showTenders'
]);
Route::get('dashboard/bidder/tenders', [
//    'middleware' => 'auth',
    'uses' => 'BidderController@showTenders'
]);


//Route::get('tenders', function () {
//    return view('dashboard.officer.tenders');
//});
//Route::get('dashboard/officer/tenders', 'OfficerController@showTenders');
//Route::get('', 'BidderController@showTenders');



Route::get('contract/create', function () {
    return view('dashboard.officer.createcontract');
});

Route::get('tender/create', function () {
    return view('dashboard.officer.createtender');
});
Route::post('tender/store', 'OfficerController@storeTender');
//Route::post('tender/store', [
////    'middleware' => 'auth',
//    'uses' => 'OfficerController@storeTender'
//]);


Route::get('officer/contracts', function () {
    return view('dashboard.officer.contracts');
});
Route::get('officer/profile', function () {
    return view('dashboard.officer.profile');
});

Route::get('bidder/profile', function () {
    return view('dashboard.bidder.profile');
});

Route::post('officer/store', 'OfficerController@storeOfficer');
Route::post('bidder/store', 'BidderController@storeBidder');

//Route::post('bidder/store', [
////    'middleware' => 'auth',
//    'uses' => 'BidderController@storeBidder'
//]);

//Route::post('officer/store', [
////    'middleware' => 'auth',
//    'uses' => 'OfficerController@storeBidder'
//]);

Route::post('user/login', 'OfficerController@login');
Route::get('user/logout', 'OfficerController@logout');

//Route::get('user/logout', [
////    'middleware' => 'auth',
//    'uses' => 'OfficerController@logout'
//]);

//Route::post('user/login', [
////    'middleware' => 'auth',
//    'uses' => 'OfficerController@login'
//]);
Route::post('officer/login', 'OfficerController@login');


//Route::post('sendcontact','HomeController@SendContact');