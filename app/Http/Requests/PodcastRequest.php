<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PodcastRequest extends FormRequest
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
            'title'=>'required|max:256|unique:podcasts,title'.$id,
            'type'=>'required',
            'tags'=>'required|string|max:256',
            'body'=>'required|string',
            'photo_id'=>'required|numeric',
            'category_id'=>'required|numeric',
            'price'=>'nullable|numeric',
            'meta_title'=>'required|string|max:256',
            'meta_keywords'=>'required|string|max:256',
            'meta_description'=>'required|string',
        ];
    }
}
