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
Route::get('/excel/download', 'ExcelController@download');
Route::get('/excel/read', 'ExcelController@readFile');

//admin lte

Route::get('/adminlte/detail', 'AdminLTEController@detail');
Route::prefix('adminlte')->group(function () {
	Route::get('control','AdminLTEController@control');
	Route::get('post','PostManagerController@index');
	Route::get('post/detail/{id?}','PostManagerController@geDetail');
	Route::delete('post/detail/{id}','PostManagerController@delete');
	Route::post('post/detail','PostManagerController@save');
	Route::get('auto','PostManagerController@auto');
});

Route::prefix('/student')->group(function () {
	Route::get('/','StudentController@index');
	Route::get('/detail/{id?}','StudentController@getDetail');
	Route::post('/detail','StudentController@save');
	Route::delete('/detail/{id}','StudentController@delete');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/test', 'HomeController@testCsfToken');
Route::post('/home/success', 'HomeController@success');
Route::get('/home/encode', 'HomeController@encode');

Route::get('/home/ftp', 'HomeController@test_ftp');
Route::get('/home/setlocale', 'HomeController@setlocale');
Route::get('/home/getlocale', 'HomeController@getlocale');

//cookies
Route::get('/cookies/save', 'CookiesController@save');
Route::get('/cookies/get', 'CookiesController@read');
Route::post('/home/upload', 'HomeController@receive_file');
Route::get('/home/testupload', 'HomeController@upload');

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/oauth/callback', 'SocialAuthController@callback');
Route::get('/log', 'LogController@log');
Route::get('/csv', 'HomeController@csv');
Route::get('/upload', 'UploadController@index');
Route::post('/upload', 'UploadController@upload');
