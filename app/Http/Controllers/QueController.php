<?php

namespace App\Http\Controllers;

use App\Jobs\SendReminderEmail;
use Illuminate\Http\Request;

class QueController extends Controller
{
    //

    public function runQue(){
        dispatch(new SendReminderEmail());

        echo 'vanhung';
    }
}
