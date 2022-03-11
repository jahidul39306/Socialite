<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function commentView(Request $req)
    {
        $postId = decrypt($req->postId);
        $post = Post::where('id', $postId)->first();
        $comments = Comment::select('*')->where('fk_posts_id', $postId)->get();
        return view('comment')->with('comments', $comments)->with('post', $post);
    }
}
