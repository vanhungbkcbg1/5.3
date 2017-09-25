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

	    Redis::command('hmset',array('myhash','name','vanhung',"age","27"));
	    $name=Redis::command('hget',array('myhash','name'));
	    $age=Redis::command('hget',array('myhash','age'));

	    //redis hash scan

	    $data=Redis::hscan("myhash",0,'match','age*');
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
