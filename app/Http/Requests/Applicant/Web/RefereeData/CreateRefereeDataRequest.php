<?php

namespace App\Http\Requests\Applicant\Web\RefereeData;

use Illuminate\Foundation\Http\FormRequest;

class CreateRefereeDataRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'between:3,100'],
            'occupation' => ['required', 'string', 'between:3,100'],
            'phone_number' => ['required', 'string', 'digits:11'],
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Full name is required',
            'full_name.string' => 'Full name must be a string',
            'full_name.between' => 'Full name must be 3 to 100 characters',
            'occupation.required' => 'Occupation is required',
            'occupation.string' => 'Occupation must be a string',
            'occupation.between' => 'Occupation must be 3 to 100 characters',
            'phone_number.required' => 'Phone number is required',
            'phone_number.string' => 'Phone number must be a string',
            'phone_number.digits' => 'Phone number must be 11 digits'
        ];
    }
}
