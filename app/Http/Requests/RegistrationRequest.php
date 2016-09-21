<?php

/**
* File Name :RegistrationRequest.php
* File Path :app/Http/Request/
* Author :Manish Kumar
* Date of creation :02/09/2016
* Comments if any :use to authenticate required field
*
*/

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistrationRequest extends Request
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
            'name'=>'bail|required|min:3',
            'mail'=>'required|email',
            'mobile'=>['bail','required','regex:/^[1-9][0-9]{9}/'],
            'pswd'=>'required',
            'c_pswd'=>'required',
            'pswd' => 'same:c_pswd'
        ];
    }
}
