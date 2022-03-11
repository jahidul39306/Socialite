<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
use Illuminate\Support\Facades\Session;

class FollowerController extends Controller
{
    public function followerCreate(Request $req)
    {
        $userId = decrypt($req->userId);
        $result = Follower::select('*')->where([
            ['fk_follower_users_id', '=', Session::get('id')],
            ['fk_users_id', '=', $userId]
        ])->first();
    }
}
