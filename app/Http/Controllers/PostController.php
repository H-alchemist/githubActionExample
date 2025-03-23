<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::all());
    }

    public function store(Request $request)
    {
        $post = Post::create($request->only(['title', 'description']));
        return response()->json($post, 201);
    }

    public function getOne($id)
    {
        $post = Post::findOrFail($id);
        return response()->json($post);
    }
}
