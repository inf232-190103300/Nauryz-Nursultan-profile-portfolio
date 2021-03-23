<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class ApiController extends Controller
{
    /*
This function returns that all port rows
    */
    public function index(Request $request) {
  $posts = Posts::all();

  return response($posts, 200);
    }

    /*
      Return port with post_id
    */
    public function get_post(Request $request){
        $posts = Posts::find($request->posts_id);
 
        if($posts == null){
            return response(['message' => 'There is no post'], 404);
        }
        return response($posts, 200);
    }
}