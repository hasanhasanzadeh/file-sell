<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'title'=>'required|string|max:256',
            'description'=>'required|string',
            'code'=>'required|string|min:5|max:256',
            'photo_id'=>'required',
            'status'=>'required|boolean',
            'expired'=>'required|numeric|',
        ];
    }
}
