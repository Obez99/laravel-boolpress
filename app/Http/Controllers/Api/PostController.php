<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with("category", "user", "tags")->orderBy("updated_at", "desc")->paginate(2);

        return response()->json($posts);
    }

    public function show($slug)
    {
        $post = Post::with("category", "user", "tags")->where("slug", $slug)->first();
        return response()->json($post);
    }
}
