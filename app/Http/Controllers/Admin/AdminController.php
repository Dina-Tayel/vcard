<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;


class AdminController extends Controller
{
    // if user role >0 
    //1- showing all users are registered in my website.
    public function showAllUsers()
    {
        $users=User::withCount('profile')->where("role",0)->get();
        return view("admin.show_all_users",compact("users"));
    }

    //2- showing all accounts in my website.
    public function showAllProfiles()
    {
        $profiles=Profile::with(["user:id,username,role"])->get();
        // foreach ($profiles as $profile)
        // return $profile->user->role;
        return view("admin.show_all_profiles",compact("profiles"));
    }
    public function showUserProfiles($id)
    {
        // $user=User::where("id",$id)->with("profile")->whereHas('profile')->get();
        $user=User::whereHas('profile')->find($id);
        if($user)
        {
           $profiles= $user->profile;
            return view('admin.show_user_profiles',compact("profiles"));
        }
        return redirect()->back();
    }

}
