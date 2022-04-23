<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }

    public function store(LoginRequset $request)
    {
        $credentials= 
        [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        $remember=$request->has('remember') ? true : false; 

        if(Auth::attempt($credentials,$remember)){
            return redirect("userProfile");
        }
      
        return redirect('/')->with('msg','credentials are not correct');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
