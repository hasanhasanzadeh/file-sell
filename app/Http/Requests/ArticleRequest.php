<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $id = $this->request->get('id') ? ',' . $this->request->get('id') : '';
        return [
            'title'=>'required|max:256|unique:articles,title'.$id,
            'photo_id'=>'required|numeric',
            'tags'=>'required|string|max:256',
            'category_id'=>'required|numeric',
            'body'=>'required|string',
            'meta_title'=>'required|string|max:256',
            'meta_keywords'=>'required|string|max:256',
            'meta_description'=>'required|string',
        ];
    }
}
