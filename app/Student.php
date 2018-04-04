<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table='student';
    protected $fillable=['name','date_of_birth','address','grade_id'];
    protected $casts=[

        'date_of_birth'=>'date'
    ];

    public function grade(){
        return $this->belongsTo('App\Grade');
    }

    public function setDateOfBirthAttribute($value)
    {
        if(is_null($value)){
            $this->attributes['date_of_birth'] =null;
        }else{

            $this->attributes['date_of_birth'] = \Carbon\Carbon::createFromFormat('Y/m/d', $value);
        }
    }
}
