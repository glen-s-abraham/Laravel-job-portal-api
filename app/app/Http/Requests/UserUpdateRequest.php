<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email'=>'email|unique:users',
            'mobile'=>'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users',
            'state_id'=>'integer',
            'country_id'=>'integer',
            'education_id'=>'integer',
            'specialization_id'=>'integer',
        ];
    }
}
