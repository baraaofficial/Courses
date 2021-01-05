<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'     => 'required|string|min:3|max:199',
            'username' => 'required|string|min:3|max:199|unique:users',
            'email'    => 'required|string|email:rfc,dns,spoof,filter,strict|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone'    => 'required|max:255',
            'location' => 'required|string|max:255',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function message()
    {
        return [

        ];
    }
}
