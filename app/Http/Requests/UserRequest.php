<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        $id = $this->request->get('id') ? ',' . $this->request->get('id') : '';
        return [
            'name'=>'required|string|max:256',
            'password'=>'required|string|min:8|max:64',
            'mobile'=>'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users,mobile'.$id,
        ];
    }
}
