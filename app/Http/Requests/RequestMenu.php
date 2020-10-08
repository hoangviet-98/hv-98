<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestMenu extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'mu_name' => 'required|unique:hv_menu,mu_name,'.$this->id,
            'mu_slug' => 'required',
            'mu_description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'mu_name.required' => 'This field cannot be left blank',
            'mu_name.unique' => 'This field already exists',
            'mu_slug.required' => 'This field cannot be left blank',
            'mu_description.required' => 'This field cannot be left blank'
        ];
    }
}
