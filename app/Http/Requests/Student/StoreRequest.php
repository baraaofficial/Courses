<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'username' => 'required|string|min:3|max:199|unique:students',
            'email'    => 'required|string|email:rfc,dns,spoof,filter,strict|max:255|unique:students',
            'password' => 'required|string|min:8',
            'phone'    => 'required|max:255|unique:students',
            'location' => 'required|string|max:255',
        ];
    }
}
