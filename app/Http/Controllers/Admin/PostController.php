<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function slugGenerator($title)
{
    $sluggedTitle = Str::slug($title);
    $randomNumber = rand(1000, 9999);
    $sluggedTitle .= "-" . $randomNumber;
    return $sluggedTitle;
}

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where("user_id", Auth::user()->id)->orderBy("updated_at", "desc")->paginate(6);
        return view("admin.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("admin.create", compact("categories", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'content' => 'required|max:1000',
            'category_id' => 'required',
        ]);

        $data = $request->all();
        $newPost = new Post;
        $data["image"] = Storage::put('posts', $data["image"]);
        $newPost->fill($data);
        $newPost->slug = slugGenerator($newPost->title);
        $newPost->user_id = Auth::user()->id;
        $newPost->save();

        if (isset($data["tags"])) {
            $newPost->tags()->sync($data["tags"]);
        }

        return redirect()->route("admin.posts.index")->with("msg", "Post creato correttamente!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where("slug", $slug)->first();
        return view("admin.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where("slug", $slug)->first();
        $categories = Category::all();
        $tags = Tag::all();
        return view("admin.edit", compact("post", "categories", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $request->validate([
            'title' => 'required|max:50',
            'content' => 'required|max:1000',

        ]);


        $post = Post::where("slug", $slug)->first();
        $editedPost = $request->all();
        $editedPost["slug"] = slugGenerator($editedPost["title"]);

        if (!is_null($post->image)) {
            Storage::delete($post->image);
        }

        $editedPost["image"] = Storage::put('posts', $editedPost["image"]);
        $post->update($editedPost);

        if (isset($editedPost["tags"])) {
            $post->tags()->sync($editedPost["tags"]);
        } else {
            $post->tags()->detach();
        }


        return redirect()->route("admin.posts.show", $post->slug)->with("msg", "Post modificato correttamente!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where("slug", $slug)->first();
        $post->delete();
        return redirect()->route("admin.posts.index")->with("msg", "Post eliminato correttamente!");
    }
}
