<?php

namespace App\Http\Controllers\api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //get all post list
    public function getPostList(){
        $post = Post::get();
        return response()->json([
            'status' => 'success',
            'post' => $post
        ]);
    }

    //post search
     public function postSearch(Request $request){
        $post = Post::where('title','LIKE','%'.$request->key.'%')->get();
        return response()->json([
            'postSearch' => $post,
        ]);
    }

    //post details
    public function postDetails(Request $request){
        $id = $request->postId;
        $post = Post::where('post_id',$id)->first();

        return response()->json([
            'post' => $post
        ]);
    }
}
