<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Traits\UploadImageTrait;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserProfile as ModelsUserProfile;

class UserController extends Controller
{
    use UploadImageTrait;

    public function profile($username,$profilename=null)
    {
            $user=User::where("username",$username)->with('profile')->first();
            if($user){
                if(!$profilename){
                    $profile=$user->profile->first();                   
                }else{
                    $profile=$user->profile->where("profile_name",$profilename)->first();
                }
                if($profile){
                    return view("index",compact("profile","user"));
                }
            }
            return abort(404);
    }

    public function edit()
    {
        $user=User::findOrFail(auth()->user()->id);
        return view("user.edit",compact("user"));
    }
    
    public function update(UserRequest $request)
    {

    $user=User::find(Auth::id());
    if(!empty($request->password))
    {
      $user->password=Hash::make($request->pssword);
    }
    if(collect($request->img)->isNotEmpty()){
        $this->deleteImage("uploads/auth/$user->img",$user->img);
        $imageUploadName=$this->imageUpload($request,$request->img,"uploads/auth/");
        $user->img=$imageUploadName;
    }
    $user->name=$request->name;
    $user->username=$request->username;
    $user->email=$request->email;
    $user->save();
    return redirect('userProfile/index')->with('success',"data updated successfully");
    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        
        foreach ($user->profile as $profile_image )
        {
            $this->deleteImage("uploads/users/$profile_image->profile_pic",$user->img);
         }
        $user->delete();
        $this->deleteImage("uploads/auth/$user->img",$user->img);
        Auth::logout($user);
        return redirect('login');
    }

  
}
