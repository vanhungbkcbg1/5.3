<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Config;
use DB;
class ExcelController extends Controller
{
    //

    public function download(){

//        $data=Excel::create('講師給与情報取込', function($excel) {
//            $excel->sheet('Sheetname', function($sheet) {
//
//                // Sheet manipulation
//                $sheet->loadView('test');
//
//            });
//
//        });
//        $data->store('csv');
//        $data=array();
//        for($i=0;$i<1000;$i++){
//            $data[] = array(
//                            'data1',
//                            'data2',
//                            'data2',
//                            'data2',
//                            'data2',
//                            'data2',
//                            'data2',
//                            'data2',
//                            'data2',
//                            'data2',
//                            'data2',
//
//                            );
//        }
//
//
//        Excel::create('Filename', function($excel) use($data) {
//
//            $excel->sheet('Sheetname', function($sheet) use($data) {
//
////                $sheet->setWidth('A', 5);
//                $sheet->fromArray($data, null, 'A1', false, false);
//
//            });
//
//        })->export('xls');

//       $data= Excel::load(storage_path('/exports/empty.xlsx'), function($file)use($data) {
//
//            // modify stuff
//            $file->sheet('Sheet1', function($sheet) use($data) {
////
//                $sheet->fromArray($data, null, 'A1', false, false);
//
//            });
//
//        });
////        $data->write->filename='vanhung.xlsx';
//
//        $data->download('xlsx');

//        $list = array
//        (
//            "name",
//            "value",
//            123
//        );
//        $file = fopen(storage_path('/exports/empty.csv'),"w");
//
//        $line = '';
//
//        foreach ($list as $element) {
//            // Escape enclosures
//            $element = str_replace('"', '"' . '"', $element);
//
//            // Add delimiter
//
//
//            // Add enclosed string
//            $line .= '"' . $element . '"';
//        }
//
//        // Add line ending
//        $line .= '\r\n';
//
//        // Write to file
//        fwrite($file, $line);
//
//
//
//        fclose($file);

        $users = DB::select('SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE=?', ['BASE TABLE']);

        dd($users);
        config(['database.connections.mysql.host'=> 'America/Chicago']);
        config(['test.name'=>'vanhu']);
        return config('database.connections.mysql.host');
    }
}
