<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
        return [
            'email' => 'required|max:190|min:3|unique:users,email,'.$this->id,
            'name'  => 'required',
            'phone'  => 'required|max:12|min:10|unique:users,phone,'.$this->id,
            'address'  => 'required',
            'password'  => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required'    => 'Khong duoc de trong',
            'email.unique'    => 'Da ton tai',
            'phone.required'    => 'Khong duoc de trong',
            'phone.unique'    => 'Da ton tai',
            'address.required'    => 'Khong duoc de trong',
            'password.required'    => 'Khong duoc de trong',

        ];
    }
}
