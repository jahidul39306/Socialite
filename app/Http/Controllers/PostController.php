<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function postCreate(Request $req)
    {
        $req->validate(
            [
                'postData' => 'required',
            ]
        );

        $p = new Post();
        $p->postText = $req->postData;
        $p->createdAt = Carbon::now();
        $p->status = 1;
        $p->fk_users_id = Session::get('id');
        $p->save();
        return redirect()->back();
    }
}
