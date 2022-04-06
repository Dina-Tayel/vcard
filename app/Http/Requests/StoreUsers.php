<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsers extends FormRequest
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
            "name"=>"required|max:200",
            "email"=>"required|max:200|email|unique:users,email,.$this->id",
            "password"=>"required|string|min:6|same:confirm_password",
            "confirm_password"=>"required",
        ];
    }
}
