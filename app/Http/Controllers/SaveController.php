<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Save;
use Illuminate\Support\Facades\Session;

class SaveController extends Controller
{
    public function saveCreate(Request $req)
    {
        $postId = decrypt($req->postId); 
        $fav = Save::select('*')->where(
            [
                ['fk_posts_id', '=', $postId],
                ['fk_users_id', '=', Session::get('id')]
            ]
        )->first();
        if($fav != null)
        {
            $fav->delete();
            return redirect()->route('home');
        }
        $fav = new Save();
        $fav->fk_posts_id = $postId;
        $fav->fk_users_id = Session::get('id');
        $fav->save();
        return redirect()->back();
    }
}
