<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $content=$request->input('content','');
        $students=\App\Student::where('name','like',"%$content%")->paginate(10);
        return view("student.index")->with(array('students'=>$students,'content'=>$content));
    }
    public function getDetail($id=0){
        $student=\App\Student::find($id);

        $grades=Grade::all();
        return view("student.detail",array('grades'=>$grades,'student'=>$student));
    }

    public function save(Request $request){

        try{
            $mode=$request->mode;
            if($mode=='U'){
                //update

                Student::where('id',$request->student['id'])->update($request->student);


            }else{
                //add
                $data=\App\Student::create($request->student);
            }
            return 'success';
        }catch(\Exception $e){
            throw $e;
        }

    }

    public function delete($id){
        try{
            Student::where('id',$id)->delete();
        }catch(\Exception $e){
            throw  $e;
        }
    }
}
