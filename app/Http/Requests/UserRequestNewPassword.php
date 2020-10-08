<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestNewPassword extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password'  => 'required',
            'password-confirm'  => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'password.required'                     => 'Khong duoc de trong',
            'password-confirm.required'             => 'Khong duoc de trong',
            'password-confirm.same'                 => 'Mat khau ko trung khop',

        ];
    }
}
