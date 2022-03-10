<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function registration()
    {
        return view('Authenticate.registration');
    }

    public function registrationGoogle()
    {
        session(['from' => 'registration']);
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function registrationSubmit(Request $req)
    {
        $req->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]
        );

        $us = new User();
        $us->name = $req->name;
        $us->email = $req->email;
        $us->password = Hash::make($req->password);
        $us->type = 'General';
        $us->status = 1;
        $us->emailVerified = 0;
        $us->save();

        Session::flash('message', 'Registration successful!, Please login');
        return redirect()->route('login');
    }

    public function registrationGoogleSubmit(Request $user)
    {
        $findUser = User::where('google_id', $user->id)->first();
        if($findUser)
        {
            Session::flash('message', 'You are already registered!, Please login');
            return redirect()->route('login');
        }
        else
        {
            $newUser = new User();
            $newUser->email = $user->email;
            $newUser->name = $user->name;
            $newUser->type = 'General';
            $newUser->status = 1;
            $newUser->emailVerified = 0;
            $newUser->google_id = $user->id;
            $newUser->google_token = $user->token;
            $newUser->save();
            Session::flash('message', 'Registration successful!, Please login');
            return redirect()->route('login');
        }
    }
}
