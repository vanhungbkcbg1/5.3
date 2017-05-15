<?php

namespace App\Http\Controllers;

use App\Events\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    //
	public function index(){
		return view('chat.chat');
	}

	public function send(Request $request){

		$message=$request->message;

		$chatEvent=new Chat($message);
		broadcast($chatEvent)->toOthers();
	}
}
