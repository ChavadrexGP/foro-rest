<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        return Post::paginate();
    }

    public function show($id)
    {

        $post = Post::find($id);
        if (!$post) {
            return response()->json(["message" => "failed"], 404);
        }
        return $post;
    }

    public function store(Request $request)
    {
        $post = new Post;
        $r = $post->fill($request->all())->save();
        if (!$r) {
            return response()->json(["message" => "failed"], 404);
        }
        return $post;
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(["message" => "failed"], 404);
        }
        $r = $post->fill($request->all())->save();
        if (!$r) {
            return response()->json(["message" => "failed"], 404);
        }
        return $post;
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(["message" => "failed"], 404);
        }
        $post->delete();
        return response()->json(["message" => "succes"]);
    }
}
