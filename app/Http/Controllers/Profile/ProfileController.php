<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pofile\ProfileRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        return view('profile.index');
    }

    public function create()
    {
        return view("profile.create");
    }

    public function store(ProfileRequest $request)
    {
        $imageUploadName=$this->imageUpload($request,$request->file("profile_pic"),"uploads/profiles","avatar.png");
        // ModelsUserProfile::create($request->safe()->except(['profile_pic']) + ["profile_pic"=>$imageUploadName,"user_id"=>auth()->user()->id ]);
        Profile::create(["profile_pic"=>$imageUploadName,"user_id"=>auth()->user()->id ] + $request->validated() );
        return redirect('userProfile/show')->with('success', 'You are successfully add your vcart data');
    }

    public function show()
    {
        $userprofile =Auth::user()->profile; // refactor using relationship
        $user = auth()->user();
        return view("profile.show", compact("userprofile", "user"));
    }

    public function edit(Profile $profile )
    {
        return view("profile.edit",compact("profile"));
    }

    public function update(ProfileRequest $request,Profile $profile )
    {
        if(!empty($request->profile_pic))
        {
            $imageUploadName= $this->imageUpload($request,$request->profile_pic,"uploads/profiles");
            if($profile->profile_pic !="avatar.png") {
                $this->deleteImage("uploads/profiles/$profile->profile_pic",$profile->profile_pic);
            }
            $profile->update(["profile_pic"=>$imageUploadName] + $request->validated() );
            return redirect('userProfile')->with('success', 'profile is updated successfully');
        }
        $profile->update($request->validated());
        return redirect('userProfile')->with('success', 'profile is updated successfully');
    }

    public function destroy(Profile $profile)
    {
        if($profile->profile_pic !="avatar.png")
        {
            $this->deleteImage("uploads/profiles/$profile->profile_pic",$profile->profile_pic);
        }
        $profile->delete();
        return redirect('userProfile')->with('success', 'profile is deleted successfully');
    }
}
