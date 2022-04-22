<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserProfile as ModelsUserProfile;
use App\Models\User;

class AdminController extends Controller
{
    // if user role >0 
    //1- showing all users registered in my website
    public function showUsers()
    {
        $users=User::withCount('profile')->where("role",0)->get();
        return view("admin.show_all_users",compact("users"));
    }

    //2- showing all accounts in my website
    public function showProfiles()
    {
        $profiles=ModelsUserProfile::with("user:id,name")->get();
        // foreach ($profiles as $profile)
        // return $profile->user->name;
        return view("admin.show_all_profiles",compact("profiles"));
    }

}
