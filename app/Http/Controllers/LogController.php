<?php

namespace App\Http\Controllers;

use App\Jobs\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    //

    public function log(Request $request){

        $item=[
            "name"=>"vanhung",
            "age"=>"29"
        ];
        dispatch(new Log($item));
        return 'done';
    }
}
