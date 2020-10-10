<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'title'=>'required|string',
            'email'=>'nullable|email',
            'banner_text'=>'required|string',
            'banner'=>'required|string',
            'icon_image'=>'required',
            'description_banner'=>'required|string',
            'about'=>'required|string',
            'copy_right'=>'required|string',
        ];
    }
}
