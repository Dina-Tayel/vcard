<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use UploadImageTrait;

    public function register()
    {
        return view("auth.register");
    }

    public function registerRequest(RegisterRequest $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->remember_token=Str::random("10");
        $imageUploadName=$this->imageUpload($request,$request->img,"public/auth/");
        
        $user->img=$imageUploadName;
        $user->save();
        Auth::login($user,true);
        return redirect("userProfile/index");
    }

}
