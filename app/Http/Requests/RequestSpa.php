<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSpa extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'spa_name' => 'required|unique:hv_spa,spa_name,' . $this->id,
            'spa_address' => 'required',
            'spa_phone' => 'required|max:10',
        ];
    }
}
