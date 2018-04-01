<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Model\Post;
use App\Repository\IRepository;
use App\Repository\PostRepository;
use Illuminate\Http\Request;
use Debugbar;
use Illuminate\Support\Facades\Auth;
use DB;

class PostManagerController extends AdminLTEController
{


	public function index(Request $request){
//		$users = DB::table('users')->paginate(15);
		$content=$request->input('content','');
		$posts=\App\Post::where('content','like',"%$content%")->paginate(10);
		return view("post.index")
			->with(array('posts'=>$posts,'content'=>$content));
	}
	public function geDetail($id=0){

		$post=\App\Post::find($id);
		return view("post.detail",array('post'=>$post));
	}

	public function delete($id){
		try{
			Comment::where('post_id',$id)->delete();

			\App\Post::where('id',$id)->delete();
		}catch(\Exception $e){
			throw  $e;
		}
	}
	public function save(Request $request){

		try{
			$mode=$request->mode;
			if($mode=='U'){
				//update

				DB::transaction(function()use($request){
					$post=\App\Post::where('id',$request->post['id'])->first();
					$post->update($request->post);

					//delete data
					$exist_key=[];
					$new_commenst=array();
					foreach($request->comments as $comment){
						if($comment['id']){
							$exist_key[]=$comment['id'];
						}else{
							$new_commenst[]=$comment;
						}
					}


					Comment::whereNotIn('id',$exist_key)->where('post_id',$post->id)->delete();

					//update
					foreach($request->comments as $comment){
						if($comment['id']){

							Comment::where('id',$comment['id'])->update($comment);
						}
					}

					//insert
					$post->comments()->createMany($new_commenst);

				});


			}else{
				//add
				$post=$request->post;
				$post['user_id']=Auth::user()->id;

				DB::transaction(function () use($request,$post) {
					$data=\App\Post::create($post);
					$data->comments()->createMany(
						$request->comments
					);
				});
			}
			return 'success';
		}catch(\Exception $e){
			throw $e;
		}

	}

}
