<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pofile\ProfileRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\UserProfile as ModelsUserProfile;
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
        $user = auth()->user();
        return view("profile.create", ["user" => $user]);
    }

    public function store(ProfileRequest $request)
    {
        $imageUploadName=$this->imageUpload($request,$request->file("profile_pic"),"public/profiles","avatar.png");
        ModelsUserProfile::create($request->safe()->except(['profile_pic']) + ["profile_pic"=>$imageUploadName,"user_id"=>auth()->user()->id ]);
        return redirect('userProfile/show')->with('success', 'You are successfully add your vcart data');
    }

    public function show()
    {

        $userprofile =Auth::user()->profile; // refactor using relationship
        $user = auth()->user();
        return view("profile.show", compact("userprofile", "user"));
    }

    public function edit($id)
    {
        $user = auth()->user();
        $userprofile = ModelsUserProfile::findOrFail($id);
        return view("profile.edit", ['user' => $user, 'userprofile' => $userprofile]);
    }

    public function update(ProfileRequest $request, $id)
    {

        $userprofile = ModelsUserProfile::findOrFail($id);
        if(!empty($request->profile_pic))
        {
            $imageUploadName= $this->imageUpload($request,$request->profile_pic,"public/profiles");
            if($userprofile->profile_pic !="avatar.png") {
                $this->deleteImage("public/profiles/$userprofile->profile_pic",$userprofile->profile_pic);
            }
            $userprofile->update($request->except(['profile_pic']) + ["profile_pic"=>$imageUploadName] );
        }
        $userprofile->update($request->except(['profile_pic']));
        return redirect('userProfile')->with('success', 'profile is updated successfully');
    }

    public function destroy($id)
    {
        $userprofile = ModelsUserProfile::findOrFail($id);
        if($userprofile->profile_pic !="avatar.png") {
            $this->deleteImage("public/profiles/$userprofile->profile_pic",$userprofile->profile_pic);
        }
        $userprofile->delete();
        return redirect('userProfile')->with('success', 'profile is deleted successfully');
    }
}
