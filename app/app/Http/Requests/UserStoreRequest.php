<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
            'mobile'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users',
            'state_id'=>'required|integer',
            'country_id'=>'required|integer',
            'education_id'=>'required|integer',
            'specialization_id'=>'required|integer',
        ];
    }
}
