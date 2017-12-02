<?php

namespace App\Http\Controllers;

use App\Events\ChatMessageWasReceived;
use Illuminate\Http\Request;

class CookiesController extends Controller
{
    //

    public function save(){
        //expire when webrowser close
        setcookie('test','test');

        //expire after 21 minutes
        setcookie('test','test',21);
        return "saved cookies";
    }

	public function read(){
		return view("cookies.test");
	}
}
