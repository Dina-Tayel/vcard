<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>'required|min:3|max:100',
            'username'=>"required|unique:users,username,". Auth::id(),
            'email'=>'required|max:100|unique:users,email,'. Auth::id(),
            'img'=>'image|mimes:png,jpg,gif,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'email.required'  => 'The :attribute field is required.',
            'email.unique'    => ':attribute is already used'
          ];
    }

    public function attributes(){
        return [
            'img' => 'image',
        ];
    }

}


