<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeRequest extends FormRequest
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
            'title'=>'required|max:256|unique:episodes,title'.$id,
            'file_url'=>'',
            'course_id'=>'required',
            'type'=>'required',
            'file_time'=>'required',
            'file_size'=>'required|numeric',
            'tags'=>'required|string|max:256',
            'number'=>'required|numeric',
            'body'=>'required|string',
        ];
    }
}
