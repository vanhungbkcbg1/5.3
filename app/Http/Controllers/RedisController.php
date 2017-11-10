<?php

namespace App\Http\Controllers;

use Ehann\RediSearch\Fields\NumericField;
use Ehann\RediSearch\Fields\TextField;
use Ehann\RediSearch\Redis\RedisClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Ehann\RediSearch\Index;
class RedisController extends Controller
{
    //

    public function index(){


//	    $redis_client=new RedisClient($redis = 'Predis\Client', $hostname = '192.168.99.100', $port = 6379, $db = 0, $password = null);
	    $bookIndex = app('bookClient');
	    $bookIndex->add([
		    new TextField('title', 'Tale of Two Cities'),
		    new TextField('author', 'Charles Dickens'),
		    new NumericField('price', 10.99),
		    new NumericField('stock', 231),
	    ]);

	    $bookIndex->add([
		    new TextField('title', 'Cities hello Two'),
		    new TextField('author', 'dsdsds Dickens'),
		    new NumericField('price', 1.99),
		    new NumericField('stock', 231),
	    ]);

	    $result = $bookIndex->search("@price:[10.98,+inf]");
	    foreach($result->getDocuments() as $doc){
		    $bookIndex->delete($doc->id);
	    }


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
