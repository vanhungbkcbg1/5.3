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
use Validator;

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
			$error_response=array();

			$validator = Validator::make($request->post, [
				'content' => 'required|min:10',
			]);

			$validator_comment=Validator::make($request->comments, [
				'*.comment_content' => 'min:10',
				'*.my_email' => 'min:10',
			],[

				'*.comment_content.min'=>'content must be at least 10 character',
				'*.my_email.min'=>'Email must be at least 10 character'
			]);
			if($validator_comment->fails()){
				$error=$validator_comment->errors();

				foreach($request->comments as $key=>$value){
					foreach($value as $key1=>$value1){
						if($error->has("$key.{$key1}")){
							$error_response[".$key1"][]=['error'=>$error->get("$key.$key1"),"id"=>$key];
						}
					}
				}
			}
			if($validator->fails()){


				$error=$validator->errors();
				foreach($error->messages() as $key=>$value){
					$error_response["#{$key}"]=$value;
				}

			}

			if($error_response){
				return response()->json(['status'=>201,'errors'=>$error_response]);
			}

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
