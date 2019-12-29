<?php
namespace App\Http\Controllers;
class DemoController extends Controller
{
    public function test(){
        return "helloword";
    }

    public function test(){
        if(1)
        return 1;
        else return 3;
    }
}