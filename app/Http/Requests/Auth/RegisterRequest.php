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
            'name'=>'required|string|min:3|max:100',
            'email'=>"required|email|unique:users,email,.$this->id",
            'password'=>'required|string|min:6|max:20|same:confirm_password',
            'confirm_password'=>'required',
            'img'=>'required|image|mimes:png,jpg,gif,jpeg',
        ];
    }
}