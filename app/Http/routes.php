<?php



// ==================================
// BASIC AUTH =======================
// ==================================

// Route::get('login', ['middleware' => 'auth.basic', function(){

//     return view('login.main');
// }]);

// Route::get('admin', function (){
// 	return view('admin.main');
// });
Route::group(['middleware' => 'web'], function() {
	Route::controllers([
		'auth' 		=> 'Auth\AuthController',
		'password' 	=> 'Auth\PasswordController',
	]);

	Route::get('/', function(){
		if(Auth::check()){
			return redirect('blocks');
		}
		return view('home');
	});

    Route::get('{provider}/authorize', 'Auth\AuthController@redirectToProvider');
    Route::get('{provider}/login', 'Auth\AuthController@handleProviderCallback');

    Route::get('logout', function(){
    	Auth::Logout();
    	return redirect('auth/login');
    });

    Route::get('blocks', ['middleware' => 'admin', 'uses'=>'blocksController@index']);

	Route::group(['middleware' => 'auth'], function() {

		//Route::resource('admin/users', 'AdminUserController');

		//Route::resource('blocks', 'blocksController');


		Route::resource('custodians', 'custodiansController');

		Route::resource('exchanges', 'exchangesController');

		Route::resource('needs', 'needsController');

		Route::get('notes/{block_id}', 'notesController@show');
		Route::post('notes/{block_id}', 'notesController@store');

		Route::resource('notes', 'notesController');

		Route::resource('reps', 'repsController');

        Route::resource('admin', 'AdminUserController');
        Route::get('admin/edit/{user_id}', 'AdminUserController@edit');


    });
});