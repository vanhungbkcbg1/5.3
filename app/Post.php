<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $table='post';


    //cac truong co the thuc hien duoc khi fill data from request->model
    protected $fillable=['content','user_id'];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
