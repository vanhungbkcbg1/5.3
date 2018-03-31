<?php

namespace App\Http\Controllers;

use App\Repository\IRepository;
use App\Repository\PostRepository;
use Illuminate\Http\Request;
use Debugbar;

class AdminLTEController extends Controller
{
    //
	private $post;
	public function __construct(PostRepository $post)
	{
		$this->post=$post;
	}

	public function index(){
		return view('lte.index');
	}

	public function detail(){

		return view('lte.detail');
	}

	public function control(){
		return view('lte.control');
	}
}
