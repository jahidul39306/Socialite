<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Follower;

class ProfileController extends Controller
{
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
                    'profileImage'=>'mimes:jpg,png',
                ]
                );
                $profile=Profile::where('fk_users_id','=',$userId)->first();
                $user=User::where('id','=',$userId)->first();
                if($req->file('profileImage')=='')
                {
                    $filename=$profile->profileImage;
                    $profile->address=$req->address;
                    $profile->dob=$req->dob;
                    $profile->gender=$req->gender;
                    $profile->religion=$req->religion;
                    $profile->relationship=$req->relationship;
                    $profile->fk_users_id=$userId;
                    $profile->save();
                    $user->name=$req->name;
                    $user->save();
                    

                }
                else{
                    $filename=$req->name.'.'.$req->file('profileImage')->getClientOriginalExtension();
                //  return $filename;
                    $req->file('profileImage')->storeAs('public/images',$filename);
                    $profile->address=$req->address;
                    $profile->dob=$req->dob;
                    $profile->gender=$req->gender;
                    $profile->religion=$req->religion;
                    $profile->relationship=$req->relationship;
                    $profile->profileImage="storage/images/".$filename;
                    $profile->fk_users_id=$userId;
                    $profile->save();
                    $user->name=$req->name;
                    $user->save();
                }
                
                
                Session::flash('message', 'Profile upload successful');
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

    public function getProfileByID(Request $req)
    {
        $userId = decrypt($req->userId);
        $profileData=Profile::where('fk_users_id','=',$userId)->first();
        $profileName=User::where('id','=',$userId)->select('name')->first();
        $result = Follower::select('*')->where([
            ['fk_follower_users_id', '=', Session::get('id')],
            ['fk_users_id', '=', $userId]
        ])->first();
        //return $profileData->profileImage;
        return view('Profile.profile')->with('profileData',$profileData)->with('profileName',$profileName)->with('result', $result);
        // else
        // return failed;
    }

}