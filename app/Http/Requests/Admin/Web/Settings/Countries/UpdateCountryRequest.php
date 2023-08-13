<?php

namespace App\Http\Requests\Admin\Web\Settings\Countries;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'between:3,200']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Country name is required',
            'name.string' => 'Country name must be a string',
            'name.between' => 'Country name must be between 3 to 200 characters',
        ];
    }
}
