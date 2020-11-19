<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'pro_name' => 'required|unique:hv_product,pro_name,' . $this->id,
            'pro_category_id' => 'required',
            'pro_number' => 'required',
            'pro_description' => 'required',
            'pro_content' => 'required',
            'pro_description_seo' => 'required',
            'pro_price' => 'required|max:9'
        ];
    }

    public function messages()
    {
        return [
            'pro_name.required' => 'This field cannot be left blank',
            'pro_name.unique' => 'This field already exists',
            'pro_category_id.required' => 'This field cannot be left blank',
            'pro_content.required' => 'This field cannot be left blank',
            'pro_price.required' => 'This field cannot be left blank',
            'pro_price.max' => 'Price is too long'

        ];
    }
}
