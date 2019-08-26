<?php

namespace App\Http\Controllers;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->middleware('auth',['only'=>['add','view']]);
    }

    //Create New post
    public function createPost(Request $request)
    {
         
        $post = Post::create($request->all());
        return response()->json($post);
    }


    //update post
    public function updatePost(Request $request,$id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->views = $request->input('views');
        $post->save();

        return response()->json($post);

    }


    // for delete
    public function deletePost($id)
    {
         $post = Post:: find($id);
         $post->delete();

         return response()->json('removed Successfully');

    }

    // for view post
    public function viewPost($id)
    {
         $post = Post:: find($id);
         return response()->json($post);

    }

    // lIst of our post

    public function index()
    {
        $post = Post::all();
        return response()->json($post);
    }
}
