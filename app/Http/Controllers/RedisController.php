<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    //

    public function index(){

        Redis::set('name','vanhung');
        $name=Redis::get('name');
        return $name;
    }

    public function publish(){

        Redis::publish('my-channel',json_encode(['name'=>'vanhung']));
    }

    public function register(){
        Redis::subscribe('my-channel',function($message){

            echo 'regis'.$message;
        });
    }
}
