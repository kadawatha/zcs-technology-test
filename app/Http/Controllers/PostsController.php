<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();

        return view('posts')->with('posts', $posts);
    }

    public function addPost(Request $request)
    {
        $post = Post::create($request->all());

        return response()->json($post);
    }

    public function editPost($post_id)
    {
        $post = Post::find($post_id);

        return response()->json($post);
    }

    public function updatePost(Request $request, $post_id)
    {
        $post = Post::find($post_id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->nic = $request->nic;
        $post->contact = $request->contact;
        $post->address = $request->address;
        $post->password = $request->password;


        $post->save();

        return response()->json($post);
    }

    public function deletePost($post_id)
    {
        $post = Post::destroy($post_id);

        return response()->json($post);
    }

}
