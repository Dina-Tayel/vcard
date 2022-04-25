<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use UploadImageTrait;

    public function create()
    {
        return view("auth.register");
    }

    public function store(RegisterRequest $request)

    {
        $imageUploadName=$this->imageUpload($request,$request->img,"uploads/auth/");
        $user=User::create(array_merge($request->validated(),
        ['password'=>bcrypt($request->password),"img"=>$imageUploadName]));
        Auth::login($user,true);
        return redirect("userProfile");
    }

}
