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

	    $object=new \stdClass();
	    $object->name="vanhung";
	    $object->age=27;

	    $object1=new \stdClass();
	    $object1->name="vanhungbk";
	    $object1->age=27;

	    Redis::command('zadd',array('myindex',0,json_encode($object)));
	    Redis::command('zadd',array('myindex',0,json_encode($object1)));

	    //redis hash scan
	    $data=Redis::command('zrangebylex',array('myindex','[vanhung','+'));

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
