<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //Create New post
    public function add(Request $request)
    {

        $request['api_token'] = str_random(60);
        $request['password'] = app('hash')->make($request['password']);
        $user = User::create($request->all());
        return response()->json($user);
    }


    //update post
    public function updateUser(Request $request,$id)
    {
         $user = User::find($id);
         $post->update($request->all());


        return response()->json($post);

    }


    // for delete
    public function deleteUser($id)
    {
         $post = User:: find($id);
         $post->delete();

         return response()->json('removed Successfully');

    }

    // for view post
    public function viewUser($id)
    {
         $post = User:: find($id);
         return response()->json($post);

    }

    // lIst of our post

    public function index()
    {
        $post = User::all();
        return response()->json($post);
    }
}
