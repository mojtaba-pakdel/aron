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
        if($this->method() == 'POST'){
            return [
                'title'=>'required|max:250',
                'body'=>'required',
                'tags'=>'required',
                'number'=>'required',
                'time'=>'required',
                'type'=>'required',
                'images'=>'required',
                'videoUrl'=>'required',
            ];
        }

        return [
            'title'=>'required|max:250',
            'body'=>'required',
            'tags'=>'required',
            'type'=>'required',
            'number'=>'required',
            'time'=>'required',
        ];
    }
}
