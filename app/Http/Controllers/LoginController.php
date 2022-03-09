<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('Authenticate.login');
    }

    public function loginGoogle()
    {
        session(['from' => 'login']);
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function loginSubmit(Request $req)
    {
        $req->validate(
            [
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
            ],
        );
        $findUser = User::where('email', $req->email)->first();
        if(Hash::check($req->password, $findUser->password))
        {
            return "<h1>you are logged in<h1>";
        }
        return "<h1>Login failed</h1>";
    }

    public function loginGoogleSubmit(Request $user)
    {
        $findUser = User::where('google_id', $user->id)->first();
        if($findUser)
        {
            Session::flash('message', 'You are loggedin');
            return "<h1>you are logged in<h1>";
        }
        else
        {
            return "<h1>You have no account with this account<h1>";
        }
    }
}
