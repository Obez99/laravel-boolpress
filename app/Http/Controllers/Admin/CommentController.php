<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'content' => 'required|max:1000'
        ]);
        //dump($request->all());
        $data = $request->all();
        $data += ["user_id" => Auth::user()->id];
        $newComment = new Comment;
        $newComment->fill($data);
        $newComment->save();
        return redirect()->route("admin.posts.show", $newComment->post_id);
    }
}
