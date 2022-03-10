<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Session;

class LikeController extends Controller
{
    public function likeCreate(Request $req)
    {
        $postId = decrypt($req->postId); 
        $like = Like::select('*')->where(
            [
                ['fk_posts_id', '=', $postId],
                ['fk_users_id', '=', Session::get('id')]
            ]
        )->first();
        if($like != null)
        {
            $like->delete();
            return redirect()->route('home');
        }
        $like = new Like();
        $like->fk_posts_id = $postId;
        $like->fk_users_id = Session::get('id');
        $like->save();
        return redirect()->route('home');
    }
}
