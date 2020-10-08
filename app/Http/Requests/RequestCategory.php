<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cat_name' => 'required|unique:hv_categories,cat_name,'.$this->id,
            'cat_slug' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'cat_name.required' => 'Trường này không được để trống',
            'cat_name.unique' => 'Trường này đã tồn tại',
            'cat_slug.required' => 'Trường này không được để trống',


        ];
    }
}
