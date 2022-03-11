<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function commentView(Request $req)
    {
        $postId = decrypt($req->postId);
        $post = Post::where('id', $postId)->first();
        $comments = Comment::select('*')->where('fk_posts_id', $postId)->get();
        return view('comment')->with('comments', $comments)->with('post', $post);
    }

    public function commentCreate(Request $req)
    {
        $req->validate(
            [
                'comment' => 'required',
            ]
        );

        $c = new Comment();
        $c->text = $req->comment;
        $c->createdAt = Carbon::now();
        $c->fk_users_id = Session::get('id');
        $c->fk_posts_id = $req->postsId;
        $c->save();
        return redirect()->back();
    }
}
