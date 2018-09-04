<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('/', function () {
    //return view('layouts.app');
    return view('my/main');
});

//access only for authorized users
Route::group(['middleware' => 'auth'], function () {
	// do transfer
	Route::match(['get', 'post'], '/transfer/do', ['uses'=>'TransferController@do_transfer', 'as'=>'do_transfer']);
	//show transfers
	Route::get('/transfer/show/{session_user_id}', ['uses'=>'TransferController@show', 'as'=>'show'])->where('id', '[0-99999999999]+');
});

//authorization
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
});
