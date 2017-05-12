<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLTEController extends Controller
{
    //

	public function index(){
		return view('lte.index');
	}
}
