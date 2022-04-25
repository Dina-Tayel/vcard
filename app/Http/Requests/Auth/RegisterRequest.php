<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|string|max:50',
            'username'=>"required|string|min:5|max:100|unique:users,username",
            'email'=>"required|email|max:50|unique:users,email",
            'password'=>'required|string|min:6|max:20|same:confirm_password',
            'confirm_password'=>'required',
            'address'=>'required|max:100',
            'img'=>'required|image|mimes:png,jpg,gif,jpeg',
        ];
    }
}
