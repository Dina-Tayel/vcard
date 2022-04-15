<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileRequest;
use App\Http\Requests\StoreUsers;
use App\Http\Requests\userProfile;
use App\Http\Traits\UploadImageTrait;
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
        $imageUploadName=$this->imageUpload($request,$request->file("profile_pic"),"public/users","avatar.png");
        ModelsUserProfile::create($request->safe()->except(['profile_pic']) + ["profile_pic"=>$imageUploadName,"user_id"=>auth()->user()->id ]);
        return redirect('userProfile/show')->with('success', 'You are successfully add your vcart data');
    }

    public function show()
    {
        // $userprofile = ModelsUserProfile::where('user_id', auth()->id())->get();
        // $userprofile = ModelsUserProfile::findOrFail(auth()->user()->id);
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
        $userprofile->phone = $request->phone;
        $userprofile->fb = $request->fb;
        $userprofile->linkedin = $request->linkedin;
        $userprofile->email = $request->email;
        $userprofile->github = $request->github;
        // dd($request->profile_pic);
        if(!empty($request->profile_pic))
        {
            if($userprofile->profile_pic !="avatar.png") {
                $this->deleteImage("public/users/$userprofile->profile_pic");
            }
            $imageUploadName= $this->imageUpload($request,$request->file("profile_pic"),"public/users");
            $userprofile->profile_pic = $imageUploadName;
        }

        $userprofile->update();
        return redirect('userProfile/index')->with('success', 'profile is updated successfully');
    }

    public function destroy($id)
    {
        $userprofile = ModelsUserProfile::findOrFail($id);
        if($userprofile->profile_pic !="avatar.png") {
            $this->deleteImage("public/users/$userprofile->profile_pic");
        }
        $userprofile->delete();
        return redirect('userProfile/create')->with('success', 'profile is deleted successfully');
    }
}
