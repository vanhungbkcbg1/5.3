<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageWasReceived;
use Illuminate\Http\Request;

class MyController extends Controller
{
    //

    public function test(){
        return "hello";
    }

	public function broadCast(){
		event(new ChatMessageWasReceived());
	}
}
