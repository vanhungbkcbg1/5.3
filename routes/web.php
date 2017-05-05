<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', 'MyController@test');
Route::get('/mail', 'MailController@sendMail');
Route::get('/runque', 'QueController@runQue');
Route::get('/soap', 'WCFController@callService');

Route::get('/bridge', function() {
	$pusher = App::make('pusher');

	$pusher->trigger( 'test',
		'ChatMessageWasReceived',
		array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

	return view('welcome');
});

Route::get('/echo', 'MyController@broadCast');