<?php

namespace App\Http\Requests\lang;

use Illuminate\Foundation\Http\FormRequest;

class StoreLangReguest extends FormRequest
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
            'name_ar'        => 'required|string|min:3|max:199',
            'name_en'        => 'required|string|min:3|max:199',
            'description_ar' => 'required|string|min:5',
            'description_en' => 'required|string|min:5',
            'image'          => 'required|image:jpg,jpeg,png,bmp,gif,svg|file',
            'by'             => 'required',
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
            'name_ar.required' => 'يجب إدخال الاسم',
            'name_ar.string'   => 'يجب أن يكون الاسم نصي',
            'name_ar.min'      => 'يجب أن يكون طول نص الاسم على الأقل 3 حروفٍ/حرفًا',
            'name_ar.max'      => 'يجب أن يكون طول نص الاسم على الأكثر 199 حروفٍ/حرفًا',


            'name_en.required' => 'Name is required',
            'name_en.string'   => 'The name must be text',
            'name_en.min'      => 'Name text must be at least 3 characters / character long',
            'name_en.max'      => 'Name text must be at most 199 characters / characters long',


            'description_ar.required' => 'يجب إدخال الوصف',
            'description_ar.string'   => 'يجب أن يكون الوصف نصي',
            'description_ar.min'      => 'يجب أن يكون طول نص الاسم على الأقل 5 حروفٍ/حرفًا',


            'description_en.required' => 'Description is required',
            'description_en.string'   => 'The Description must be text',
            'description_en.min'      => 'Name text must be at least 5 characters / character long',

        ];
    }
}
