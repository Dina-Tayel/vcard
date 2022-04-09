<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Monolog\Handler\IFTTTHandler;

class UserController extends Controller
{
    public function edit()
    {
        $user=User::findOrFail(auth()->user()->id);
        return view("auth.edit",compact("user"));
    }
    
    public function update(Request $request)
    {
        $id=Auth::id();
        $request->validate([
            'name'=>'required|min:3|max:100',
            'email'=>'required|max:100|unique:users,email,'. $id,
            'img'=>'image|mimes:png,jpg,gif,jpeg',
        ]);
    $user=User::find($id);
    if(!empty($request->password)){
      $user->password=Hash::make($request->pssword);
    }else{
        $user->password=$user->password;
    }
    $oldImage=auth()->user()->img;
    if(empty($request->file()->img)){
        $user->img=$oldImage;
    }

    if($request->hasFile('img'))
    {
        $img=public_path('uploads/auth/'.$user->img);
        if(File::exists($img)){
            File::delete($img);
        }
        $image=$request->file('img');
        $imageExtension=$image->getClientOriginalExtension();
        $path=public_path('uploads/auth');
        $imageUploadName=time() . '_'. uniqid() . '.' . $imageExtension ;
        $image->move($path,$imageUploadName);
        $user->img=$imageUploadName;
    }
    
    $user->email=$request->email;
    $user->name=$request->name;
    $user->save();
    return redirect('userProfile/show')->with('success',"data updated successfully");
    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user_image=$user->img;
        $user_image=public_path('uploads/auth/'.$user->img);
        if(File::exists($user_image)){
            File::delete($user_image);
        }

        foreach ($user->profile as $profile_image )
        {
            // echo($profile_image->profile_pic);
            if($profile_image->profile_pic !='avatar.png'){
                $path=public_path('uploads/users/'.$profile_image->profile_pic);
                if(File::exists($path)){
                    File::delete($path);
                }
            }
        }

        if($user)
        {
            $user->delete();
        }
        return redirect('login');


        // $profile_pics= $user->profile->each(function($q) {
        //     // echo    $q->profile_pic;
        //     $path=public_path('uploads/users/'.$q->profile_pic);
        // });
        // dd($path);

    }
}
