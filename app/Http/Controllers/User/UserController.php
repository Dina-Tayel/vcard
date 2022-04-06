<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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

    public function destroy()
    {

    }
}
