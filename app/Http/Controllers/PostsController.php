<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
    public function index(){
        $posts = Posts::all();

        return view('posts.index')->with(['posts' => $posts]);

    }
    public function store(Request $request){
        Posts::create([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return back();
    }

    public function get_post($id)
    {
      $posts = Posts::find($id);

      if($posts == null)
      return response(['message' => 'post not found'], 404);

     return view('posts.detail')->with(['posts' => $posts]);
    }
}
