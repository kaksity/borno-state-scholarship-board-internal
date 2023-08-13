<?php

namespace App\Http\Requests\Admin\Web\Applicants;

use Illuminate\Foundation\Http\FormRequest;

class ListApplicantsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'page' => ['required', 'integer'],
            'per_page' => ['required', 'integer', 'between:1,100'],
            'programme' => ['required', 'in:Undergraduate,Masters,Doctorate'],
        ];
    }

    public function messages()
    {
        return [
            'page.required' => 'Page is required',
            'page.integer' => 'Page must be an integer',
            'per_page.required' => 'Per page is required',
            'per_page.integer' => 'Per page must be an integer',
            'per_page.between' => 'Per page must be between 1 to 100',
            'programme.required' =>  'Programme is required',
            'programme.in' =>  'Programme is not valid',
        ];
    }
}
