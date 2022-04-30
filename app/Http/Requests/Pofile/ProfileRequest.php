<?php

namespace App\Http\Requests\Pofile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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
            "profile_name"=>"required",
            "phone"=>"required|numeric|digits:11",
            "email"=>"required|max:200|email",
            "profile_pic"=>"image|mimes:png,jpg,jpeg",
            "fb"=>"required|url",
            "linkedin"=>"required|url",
            "github"=>"required|url",
        ];
    }
}
