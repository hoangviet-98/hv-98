<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAdmin extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
            return [
                'name' => 'required',
                'spa_id' => 'required',
                'email' => 'required|unique:admins,email,'.$this->id,
                'password' => 'required',
                'phone' => 'required|unique:admins,name,'.$this->id,
                'role_id' => 'required'
            ];
    }
    public function messages()
    {
        return [
            'name.required' => 'This field cannot be left blank',
            'spa_id' => 'This field cannot be left blank',
            'email.required' => 'This field cannot be left blank',
            'email.unique' => 'This field already exists',
            'password.required' => 'This field cannot be left blank',
            'phone.required' => 'This field cannot be left blank',
            'phone.unique' => 'This field already exists',
            'role_id.required' => 'This field cannot be left blank',

        ];
    }
}
