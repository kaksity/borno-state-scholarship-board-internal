<?php

namespace App\Http\Requests\Applicant\Web\SchoolData;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicantSchoolDataRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'current_level' => ['required', 'integer'],
            'date_of_admission' => ['required', 'date', 'date_format:Y-m-d'],
            'date_of_graduation' => ['required', 'date', 'date_format:Y-m-d'],
            'identity_number' => ['required', 'between:3,200'],
            'name_of_institution' => ['required', 'between:3,200'],
            'course_of_study' => ['required', 'between:3,200'],
        ];
    }

    public function messages()
    {
        return [
            'current_level.required' => 'Current Level is required',
            'current_level.integer' => 'Current Level must be an integer',
            'date_of_admission.required' => 'Date of Admission is required',
            'date_of_admission.date' => 'Date of Admission must be a date',
            'date_of_admission.date_format' => 'Date of Admission Format is not valid',
            'date_of_graduation.required' => 'Date of Graduation is required',
            'date_of_graduation.date' => 'Date of Graduation must be a date',
            'date_of_graduation.date_format' => 'Date of Graduation Format is not valid',
            'identity_number.required' => 'Identity Number is required',
            'identity_number.between' => 'Identity Number must be 3 to 200 characters',
            'course_of_study.required' => 'Course of Study is required',
            'course_of_study.between' => 'Course of Study must be 3 to 200 characters',
            'name_of_institution.required' => 'Name of Institution is required',
            'name_of_institution.between' => 'Name of Institution must be 3 to 200 characters',
        ];
    }
}
