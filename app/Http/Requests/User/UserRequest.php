<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'name'=>'required|min:3|max:100',
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
}
