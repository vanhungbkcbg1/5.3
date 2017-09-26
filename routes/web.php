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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/adminlte', 'AdminLTEController@index');
Route::get('/chat', 'ChatController@index');
Route::post('/chat', 'ChatController@send');

Route::get('/redis', 'RedisController@index');
Route::get('/redis/publish', 'RedisController@publish');
Route::get('/redis/register', 'RedisController@register');
Route::get('/download', 'ExcelController@download');

//admin lte
Route::get('/adminlte/detail', 'AdminLTEController@detail');


