<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLogin extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required',
            'password'  => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required'    => 'This field cannot be left blank',
            'password.required'    => 'This field cannot be left blank',

        ];
    }
}
