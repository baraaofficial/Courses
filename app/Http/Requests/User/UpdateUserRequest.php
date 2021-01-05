<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'username' => 'required|string|min:3|max:199',
            'email'    => 'required|string|email|max:255',
            'phone'    => 'string|max:255',
            'location' => 'string|max:255',
        ];
    }
}
