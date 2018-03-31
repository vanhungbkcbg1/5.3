<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function testCsfToken()
    {
        return response()->json(['name' => "vanhung"]);
    }

    public function success()
    {
        return response()->json(['name' => 'vanhung'], 301);
    }

    public function encode()
    {
        return response()->json(['n' => '店舗種別'], 200, array("Content-Type: application/json;charset=UTF-8"));
    }

    public function download()
    {
        $url = "http://image.24h.com.vn/upload/4-2017/images/2017-11-12/Video-ket-qua-bong-da-Tay-Ban-Nha---Costa-Rica-Dan-sao-bu-pho-dien-sieu-dang-untitled-1-1510440007-58-width660height397.jpg";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return view('download', array("output" => $output));
    }

    public function receive_file(Request $request){
        return "result";
    }

    public function upload(){

        try{
            $url = "http://demo.com:81/upload.php";

//            $data = array('name' => 'Foo', 'file' => base64_encode(file_get_contents(public_path('test.docx'))));
            $data = array('name' => 'Foo', 'file' => new \CURLFile(public_path("test.docx")));
//            $data = array('name' => 'Foo', 'file' => "sds");

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch,CURLOPT_POST,1);
            $headers = array("Content-Type:multipart/form-data");
//            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//        curl_setopt($ch,CURLOPT_SAFE_UPLOAD,false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            $output = curl_exec($ch);
            curl_close($ch);

            return $output;
        }catch(\Exception $e){
            var_export($e->getMessage());
        }

    }

    public function test_ftp(){

        try{

//            echo 'tee';
//            $letter='Z';
//            $pass='hungnv';
//            $user='hungnv';
//            $dir="\\\\hungnv-pc\\test";
//            system("net use ".$letter.": \"".$dir."\" ".$pass." /user:".$user." /persistent:no>nul 2>&1");
//            system("net use z:\\\\hungnv-pc\\test //user:hungnv hungnv");
//            $connection=ftp_connect('127.0.0.1');
//            ftp_login($connection,'hungnv','hungnv');
//            ftp_put($connection,'test.doc',public_path('laravel authentication.docx'),FTP_BINARY);
//            ftp_get($connection,public_path('1.jpg'),"test.jpg",FTP_BINARY);
//            ftp_close($connection);

            echo is_file("Z:\\test.txt")==true?"tontai":'khongtontai';
//            copy(public_path('index.php'),"Z:\\test\\1.php");
////            unlink(public_path('info.php'));
//
//            system("net use Z: /DELETE /y 1> NUL");

//            move_uploaded_file(public_path('info.php'),'http://localhost:82/images/test.php');
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }

    public function setlocale(){


        App::setLocale('hungnv');
        return App::getLocale();
    }

    public function getlocale(){


        echo env('DB_CONNECTION');
        return App::getLocale();
    }

}
