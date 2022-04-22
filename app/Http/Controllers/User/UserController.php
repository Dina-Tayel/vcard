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

    public function profile($profilename)
    {
 
        $profile=ModelsUserProfile::where("profile_name",$profilename)->first();
        if($profile){
            return view("index",compact("profile"));
        }
       return abort("404");
    }

    public function edit()
    {
        $user=User::findOrFail(auth()->user()->id);
        return view("auth.edit",compact("user"));
    }
    
    public function update(UserRequest $request)
    {

    $user=User::find(Auth::id());
    if(!empty($request->password))
    {
      $user->password=Hash::make($request->pssword);
    }

    if(collect($request->img)->isNotEmpty()){
        $this->deleteImage("public/auth/$user->img");
        $imageUploadName=$this->imageUpload($request,$request->img,"public/auth/");
        $user->img=$imageUploadName;
    }

    $user->email=$request->email;
    $user->name=$request->name;
    $user->save();
    return redirect('userProfile/index')->with('success',"data updated successfully");
    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        
        foreach ($user->profile as $profile_image )
        {
            $this->deleteImage("public/users/$profile_image->profile_pic");

         }
                
        $user->delete();
        $this->deleteImage("public/auth/$user->img");
        return redirect('login');

    }

  
}
