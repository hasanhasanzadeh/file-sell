<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'=>'required|max:255|string',
            'meta_keywords'=>'nullable|max:255|string',
            'meta_title'=>'nullable|max:255|string',
            'meta_description'=>'nullable|string',
        ];
    }

    public function messages()
    {
        return [
          'name.required'=>'نام دسته بندی را وارد کنید',
          'name.max'=>'نام دسته بندی نباید بیشتر از 255 حرف باشد',
          'name.string'=>'نام دستبه بندی را درست وارد کنید',
          'meta_title.max'=>'عنوان متای دسته بندی نباید بیشتر از 255 حرف باشد',
          'meta_keywords.max'=>'کلمات کلیدی متای دسته بندی نباید بیشتر از 255 حرف باشد',
        ];
    }

}
