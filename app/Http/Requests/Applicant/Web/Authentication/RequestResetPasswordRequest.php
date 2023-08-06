<?php

namespace App\Http\Requests\Applicant\Web\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class RequestResetPasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'between:3,150', 'email'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email Address is required',
            'email.email' => 'Email Address is not valid',
            'email.between' => 'Email Address must be between 3 to 150 characters',
        ];
    }
}
