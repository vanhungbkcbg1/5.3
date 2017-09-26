<?php
/**
 * Created by PhpStorm.
 * User: vanhu
 * Date: 9/9/2017
 * Time: 9:58 AM
 */

namespace App\Repository;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use Cache;
use Redis;

abstract class BaseRepository implements IRepository
{
    private $app;
    protected $model;

    public function __construct(App $app)
    {

        $this->app = $app;
        $this->makeModel();
    }
    public function find($id)
    {
        // TODO: Implement find() method.
        $key="{$this->basename()}:$id";
        $stored=Redis::hgetall($key);
        if(!empty($stored)){
            return $this->convertToObject($stored);
        }
        return false;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        $keys=Redis::keys("{$this->basename()}:*");
        if(!empty($keys)){
            $data=array();
            foreach($keys as $key){
                $data[]=$this->convertToObject(Redis::hgetall($key));
            }
            return $data;
        }else{
            $posts = $this->model->all();
            foreach($posts as $post){
                $this->store($post);
            }
            return $posts;
        }

    }

    public abstract function model();

    public function makeModel()
    {
        $this->model = $this->app->make($this->model());
        if (!$this->model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be instance of Illuminate\\Database\\Eloquent\\Model");
        }

    }

    private function store(Model $object){

        $key="{$this->basename()}:{$object->id}";
        Redis::hmset($key,$object->getAttributes());
    }
    private function basename(){
        return basename($this->model());
    }
    function convertToObject(array $attributes){
        $obj=$this->app->make($this->model());
        foreach($attributes as $key=>$value){
            $obj->setAttribute($key,$value);
        }
        return $obj;
    }
}