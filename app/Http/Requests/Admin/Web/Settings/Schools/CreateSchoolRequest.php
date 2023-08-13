<?php

namespace App\Http\Requests\Admin\Web\Settings\Schools;

use Illuminate\Foundation\Http\FormRequest;

class CreateSchoolRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'country_id' => ['required', 'integer'],
            'school_name' => ['required', 'string', 'between:3,200']
        ];
    }

    public function messages()
    {
        return [
            'country_id.required' => 'Country is required',
            'country_id.integer' => 'Country is not valid',
            'school_name.required' => 'School name is required',
            'school_name.string' => 'School name must be a string',
            'school_name.between' => 'School name must be between 3 to 200 characters',
        ];
    }
}
