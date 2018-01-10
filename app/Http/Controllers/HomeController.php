<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function test_ftp(){

        try{

            echo 'tee';
            $connection=ftp_connect('127.0.0.1');
            ftp_login($connection,'hungnv','hungnv');
            ftp_put($connection,'test.doc',public_path('laravel authentication.docx'),FTP_BINARY);
            ftp_close($connection);
        }catch(\Exception $e){
            throw $e;
        }
    }

}
