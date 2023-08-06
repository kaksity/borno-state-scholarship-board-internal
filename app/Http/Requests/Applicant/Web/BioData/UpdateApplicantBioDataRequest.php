<?php

namespace App\Http\Requests\Applicant\Web\BioData;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicantBioDataRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $loggedInApplicant = auth('applicant')->user();

        $rules = [
            'phone_number' => ['required', 'digits:11'],
            'nin' => ['nullable', 'digits:11'],
            'date_of_birth' => ['required', 'date', 'date_format:Y-m-d'],
            'contact_address' => ['required', 'between:3,200'],
            'lga_id' => ['required', 'integer'],
            'course_of_study' => ['required', 'between:3,200'],
            'name_of_institution' => ['required', 'between:3,200'],
            'admission_status' => ['required', 'in:Admitted,Awaiting'],
        ];

        if($loggedInApplicant->programme === 'Masters') {
            $rules += [
                'country_id' => ['required', 'integer'],
            ];
        }
        

        return $rules;
    }

    public function message()
    {
        return [
            'phone_number.required' => 'Phone Number is required',
            'phone_number.digits' => 'Phone Number must be 11 digits',
            'nin.digits' => 'NIN must be 11 digits',
            'date_of_birth.required' => 'Date of Birth is required',
            'date_of_birth.date' => 'Date of Birth must be a date',
            'date_of_birth.date_format' => 'Date of Birth Format is not valid',
            'lga_id.required' => 'Local Government Area is required',
            'lga_id.integer' => 'Local Government Area must be an integer',
            'contact_address.required' => 'Contact Address is required',
            'contact_address.between' => 'Contact Address must be 3 to 200 characters',
            'name_of_institution.required' => 'Name of Institution is required',
            'name_of_institution.between' => 'Name of Institution must be 3 to 200 characters',
            'course_of_study.required' => 'Course of Study is required',
            'course_of_study.between' => 'Course of Study must be 3 to 200 characters',
            'admission_status.required' => 'Course of study is required',
            'admission_status.between' => 'Course of study must be 3 to 200 characters',
            'country_id.required' => 'Country is required',
            'country_id.integer' => 'Country must be an integer',
        ];
    }
}
