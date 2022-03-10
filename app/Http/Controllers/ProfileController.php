<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    public function User()
    {
        return $this->belongsTo(User::class,'id');
    }

        public function editProfileData()
        {
            if(session()->has('id'))
            {
                $userId=session()->get('id');
                $profileData=Profile::where('fk_users_id','=',$userId)->first();
                
                $profileName=User::where('id','=',$userId)->select('name')->first();
                // return  $profileName;
                return view('Profile.editProfile')->with('profileData',$profileData)->with('profileName',$profileName);
            }
        }

        public function editProfileDataSubmit(Request $req)
        {
            $userId=session()->get('id');
            
            $req->validate(
                [
                    'name'=>'required | regex: /^[A-Z a-z]+$/',
                    'address'=>'required',
                    'dob'=>'required',
                    'gender'=>'required',
                    'religion'=>'required',
                    'relationship'=>'required',
                    'profileImage'=>'required|mimes:jpg,png',
                ]
                );

                $filename=$req->name.'.'.$req->file('profileImage')->getClientOriginalExtension();
                // return $filename;
                $req->file('profileImage')->storeAs('public/images',$filename);
                $profile=Profile::where('fk_users_id','=',$userId)->first();
                
                $profile->address=$req->address;
                $profile->dob=$req->dob;
                $profile->gender=$req->gender;
                $profile->religion=$req->religion;
                $profile->relationship=$req->relationship;
                $profile->profileImage="storage/images/".$filename;
                $profile->fk_users_id=$userId;
                $profile->save();
                Session::flash('message', 'Image upload successful');
                return redirect()->route('profile');



        }
        public function getProfileData()
        {
            if(session()->has('id'))
            {
                $userId=session()->get('id');
                $profileData=Profile::where('fk_users_id','=',$userId)->first();
                $profileName=User::where('id','=',$userId)->select('name')->first();
                
                //return $profileData->profileImage;
                return view('Profile.profile')->with('profileData',$profileData)->with('profileName',$profileName);
            }
            // else
            // return failed;
            
        }
}
