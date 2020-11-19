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
            'a_slug' => 'required',
            'a_description' => 'required',
            'a_content' => 'required',
            'a_description_seo' => 'required',
            'a_title_seo' => 'required',
            'pro_category_id' => 'required',


        ];
    }

    public function messages()
    {
        return [
            'a_name.required' => 'This field cannot be left blank',
            'a_name.unique' => 'This field already exists',

        ];
    }
}
