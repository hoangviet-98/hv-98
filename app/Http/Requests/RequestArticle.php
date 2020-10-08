<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestArticle extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'a_name' => 'required|unique:hv_article,a_name,'.$this->id,
            'a_slug' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'a_name.required' => 'Trường này không được để trống',
            'a_name.unique' => 'Trường này đã tồn tại',


        ];
    }
}
