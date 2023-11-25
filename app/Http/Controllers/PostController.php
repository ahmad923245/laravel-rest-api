<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
 
    public function index()
    {

        return response()->json([
            'success' => true,
            'data' => Post::get()

        ]);
    }

  
    public function store(Request $request)
    {
    
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return response()->json([
            'message' => 'Post Created successfully',
            "success" => true,
            "post" => $post
        ]);
    }

   
    public function show(Post $post)
    {
        return response()->json([
            "success"=> true,
            "post"=>$post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        return $request->all();
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();
        // return response()->json([
        //     'message' => 'Post Update successfully',
        //     "success" => true,
        //     "post" => $post
        // ]);
    }

   
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message'=>'deleted'
        ]);
    }
}
