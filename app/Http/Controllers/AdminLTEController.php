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

		$all=$this->post->getAll();
		$data=$this->post->find(1);
		Debugbar::info($data);
		Debugbar::info($all);
		return "vanun";
	}
}
