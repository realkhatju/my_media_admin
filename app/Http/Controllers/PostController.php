<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // direct post list page
    public function index(){
        $category = Category::get();
        $post = Post::get();
        return view('admin.post.index',compact('category','post'));
    }

    //create post
    public function createPost(Request $request){
        $validation = $this->postValidationCheck($request);
        if($validation->fails()){
            return back()
                        ->withErrors($validation)
                        ->withInput();
        }
        if(!empty($request->postImage)){
            $file = $request->file('postImage');
            $fileName = uniqid().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/postImage',$fileName);
            $data = $this->getPostData($request,$fileName);
        }else{
            $data = $this->getPostData($request,null);
        }
        // dd($request->toArray());
        // $file = $request->file('postImage');
        // $fileName = uniqid().'_'.$file->getClientOriginalName();
        // $file->move(public_path().'/postImage',$fileName);
        // $data = $this->getPostData($request,$fileName);
        // dd($data);
        Post::create($data);
        return back();
        // dd($fileName);
    }

    //delete post
    public function deletePost($post_id){
        $postData = Post::where('post_id',$post_id)->first();
        $dbImageName = $postData['image'];
        Post::where('post_id',$post_id)->delete();

        if(File::exists(public_path().'/postImage/'.$dbImageName)){
            File::delete(public_path().'/postImage/'.$dbImageName);
        }
        return back();
    }



    //getPostData
    private function getPostData($request,$fileName){
        return [
            'title' => $request->postTitle,
            'description' => $request->postDescription,
            'image' => $fileName,
            'category_id' => $request->postDescriptionName,
            'created_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];
    }

    //post validation check
    private function postValidationCheck($request){
        return Validator::make($request->all(),[
            'postTitle' => 'required',
            'postDescription' => 'required',
            'postDescriptionName' => 'required'
        ],[
            'postTitle.required' => 'No Post Title Found',
            'postDescription.required' => 'No Post Description Found',
            'postDescriptionName.required' => 'Choose Post Description Name',
        ]);
    }
}
