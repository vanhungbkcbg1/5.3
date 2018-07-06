<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //

    /*
     * index action
     */
    public function index(){
        return view('upload.index');
    }

    /*
     * do upload file
     */
    public function upload(Request $request){

        try{
            $file=$request->photos;
            $file->move('upload',date('Ymdhhmmss').'.'.$file->getClientOriginalExtension());
            return 'done';
        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    public function test(){
        return view('upload.viewimage');
    }
}
