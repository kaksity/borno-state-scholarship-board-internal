<?php

namespace App\Http\Requests\Applicant\Web\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'surname' => ['required', 'between:3,150'],
            'other_names' => ['required', 'between:3,150'],
            'email' => ['required', 'between:3,150', 'email'],
            'password' => ['required', 'between:8,20', 'confirmed'],
            'programme' => ['required', 'in:Undergraduate,Masters,Doctorate'],
        ];
    }

    public function messages()
    {
        return [
            'surname.required' => 'Surname is required',
            'surname.between' => 'Surname must be between 3 to 150 characters',
            'other_names.required' => 'Other names is required',
            'other_names.between' => 'Other names must be between 3 to 150 characters',
            'email.required' => 'Email Address is required',
            'email.between' => 'Email Address must be between 3 to 150 characters',
            'email.email' => 'Email Address is not valid',
            'password.required' => 'Password is required',
            'password.between' => 'Password must be 8 to 20 characters',
            'password.confirmed' => 'Password must match confirm password',
            'programme.required' =>  'Programme is required',
            'programme.in' =>  'Programme is not valid',
        ];
    }
}
