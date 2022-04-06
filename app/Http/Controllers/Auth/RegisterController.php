<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }

    public function registerRequest(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:3|max:100',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:6|max:20|same:confirm_password',
            'confirm_password'=>'required',
            'img'=>'required|image|mimes:png,jpg,gif,jpeg',
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->remember_token=Str::random("10");
        if($request->hasFile('img'))
        {
            $image=$request->file('img');
            $imageExtension=$image->getClientOriginalExtension();
            $path=public_path('uploads/auth');
            $imageUploadName=time() . '_'. uniqid() . '.' . $imageExtension ;
            $image->move($path,$imageUploadName);
        }
        $user->img=$imageUploadName;
        $user->save();
        Auth::login($user,true);
        return redirect("userProfile/index");
    }

}
