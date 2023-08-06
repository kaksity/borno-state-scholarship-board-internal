<?php

namespace App\Http\Requests\Applicant\Web\QualificationData;

use Illuminate\Foundation\Http\FormRequest;

class CreateQualificationDataRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'school_attended' => ['required', 'between:3,200'],
            'qualification_type_id' => ['required', 'integer'],
            'from_date' => ['required', 'date', 'date_format:Y-m-d'],
            'to_date' => ['required', 'date', 'date_format:Y-m-d'],
        ];
    }

    public function messages()
    {
        return [
            'school_attended.required' => 'School Attended is required',
            'school_attended.between' => 'School Attended must be between 3 to 200 characters',
            'qualification_type_id.required' => 'Qualification Type is required',
            'qualification_type_id.integer' => 'Qualification Type is not valid',
            'from_date.required' => 'From Date is required',
            'from_date.date' => 'From Date must be a date',
            'from_date.date_format' => 'From Date has an invalid format',
            'to_date.required' => 'To Date is required',
            'to_date.date' => 'To Date must be a date',
            'to_date.date_format' => 'To Date has an invalid format',
        ];
    }
}
