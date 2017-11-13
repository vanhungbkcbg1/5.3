<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //

    public function sendMail(){
//        Mail::to('vanhungbkcbg1@gmail.com')->queue(new OrderShipped());
        Mail::to('vanhungbkcbg1@gmail.com')->send(new OrderShipped('hello'));
        echo 'vanhung';
    }
}
