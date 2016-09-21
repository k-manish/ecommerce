<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProdAddRequest extends Request
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
            'name' => 'bail | required | min:3 | regex:/^[A-Za-z]*/',
            'price' => 'bail | required | regex:/^[0-9]*/',
            'qty' => 'bail | required | regex:/^[0-9]*/',
            'filename' =>'image'
        ];
    }
}
