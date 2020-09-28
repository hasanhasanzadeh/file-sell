<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GazetteRequest extends FormRequest
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
            'title'=>'required|max:256|string|unique:gazettes,title'.$id,
            'body'=>'required|string',
            'tags'=>'required|string|max:256',
            'photo_id'=>'required|numeric',
            'category_id'=>'required|numeric',
            'file_url'=>'required',
            'price'=>'nullable|numeric',
            'type'=>'required',
            'meta_title'=>'required|string|max:256',
            'meta_keywords'=>'required|string|max:256',
            'meta_description'=>'required|string',
        ];
    }
}
