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

        $filehandel=fopen(storage_path('test.txt'),'w+');
        fwrite($filehandel,'リクエストの取得');
        fwrite($filehandel,'リクエストの取得');
        fclose($filehandel);
		return view("cookies.test");
	}
}
