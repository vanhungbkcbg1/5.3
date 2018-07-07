<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class AjaxUploadController extends Controller
{
    //
    public function getDetail()
    {
        return view('ajax.detail');
    }

    public function postDetail(Request $request)
    {

        try {
            $fileUpload = $request->file('file');
            if ($fileUpload instanceof UploadedFile && $fileUpload->isValid()) {
                $filePath = "/upload";
                $fileName = date('YmdHis') . '.' . $fileUpload->getClientOriginalExtension();
                $fileUpload->move(public_path($filePath), $fileName);
                return $filePath . DIRECTORY_SEPARATOR . $fileName;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }


        return '';
    }
}
