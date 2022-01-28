<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with("post")->get();

        return response()->json($categories);
    }

    public function show($category)
    {
        $posts = Post::where("category_id", $category)->with("category", "user", "tags")->get();

        return response()->json($posts);
    }
}
