<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsers;
use App\Http\Requests\userProfile;
use App\Models\User;
use App\Models\UserProfile as ModelsUserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Symfony\Component\HttpKernel\Profiler\Profile;

use function PHPUnit\Framework\isNull;

class profileController extends Controller
{
    public function create()
    {
        $user = auth()->user();
        $userdata = ModelsUserProfile::where("user_id",$user->id)->get();
        return view("profile.create", ["user" => $user, "userdata" => $userdata]);
    }


    public function store(userProfile $request)
    {

        $profile = new ModelsUserProfile();
        $profile->phone = $request->phone;
        $profile->fb = $request->fb;
        $profile->linkedin = $request->linkedin;
        $profile->email = $request->email;
        $profile->github = $request->github;
        $profile->user_id = auth()->user()->id;
        if ($request->hasFile("profile_pic")) {
            $image = $request->file("profile_pic");
            $imageExtension = $image->getClientOriginalName();
            $imageUploadName = uniqid() . '.' . $imageExtension;
            $path = public_path('uploads/users');
            $image->move($path, $imageUploadName);
            $profile->profile_pic = $imageUploadName;
        }

        $profile->save();
        return redirect('userProfile/create')->with('success', 'You are successfully add your vcart data');
    }

    public function show()
    {

        $userprofile = ModelsUserProfile::where('user_id', auth()->id())->get();
        // $userprofile = ModelsUserProfile::findOrFail(auth()->user()->id);
        
        $user = auth()->user();
        return view("profile.show", compact("userprofile", "user"));
    }

    public function edit($id)
    {
        $user = auth()->user();
        $userprofile = ModelsUserProfile::findOrFail($id);
        return view("profile.edit", ['user' => $user, 'userprofile' => $userprofile]);
    }


    public function update(userProfile $request, $id)
    {
        $userprofile = ModelsUserProfile::findOrFail($id);
        $userprofile->phone = $request->phone;
        $userprofile->fb = $request->fb;
        $userprofile->linkedin = $request->linkedin;
        $userprofile->email = $request->email;
        $userprofile->github = $request->github;
        if($request->hasFile('img')){
            if($userprofile->profile_pic !="avatar.png") {
                unlink(public_path("uploads/users/") . $userprofile->profile_pic);
            }
            $image = $request->file("img");
            $imageExtension = $image->getClientOriginalName();
            $imageUploadName = uniqid() . '.' . $imageExtension;
            $path = public_path('uploads/users');
            $image->move($path, $imageUploadName);
            $userprofile->profile_pic = $imageUploadName;
        }
        $userprofile->update();
        return redirect('userProfile/create')->with('success', 'profile is updated successfully');
    }


    public function destroy($id)
    {
        $userprofile = ModelsUserProfile::findOrFail($id);
        if($userprofile->profile_pic !="avatar.png") {
            unlink(public_path("uploads/users/") . $userprofile->profile_pic);
        }
        // $oldimage = public_path("uploads/users/" . $userprofile->profile_pic);
        // if (File::exists($oldimage)) {
        //     File::delete($oldimage);
        // }
        $userprofile->delete();
        return redirect('userProfile/create')->with('success', 'profile is deleted successfully');
    }
}















