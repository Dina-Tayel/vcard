<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function loginRequest(loginUsers $request)
    {

        $credentials= 
        [
            'email'=>$request->email,
            'password'=>$request->password,
            
        ];
        $remember=$request->has('remember') ? true : false; 

        if(Auth::attempt($credentials,$remember)){
            return redirect("userProfile/index");
        }
      
        return redirect('login')->with('msg','credentials are not correct');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
