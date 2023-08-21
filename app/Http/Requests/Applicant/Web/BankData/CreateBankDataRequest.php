<?php

namespace App\Http\Requests\Applicant\Web\BankData;

use Illuminate\Foundation\Http\FormRequest;

class CreateBankDataRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'bank_id' => ['required', 'integer'],
            'account_name' => ['required', 'string', 'between:3,100'],
            'account_number' => ['required', 'digits:10'],
        ];
    }

    public function messages()
    {
        return [
            'bank_id.required' => 'Bank is required',
            'bank_id.integer' => 'Bank must be an integer',
            'account_name.required' => 'Account name is required',
            'account_name.string' => 'Account name must be a string',
            'account_name.between' => 'Account name must be 3 to 100 characters',
            'account_number.required' => 'Account number is required',
            'account_number.digits' => 'Account number must be 10 digits'
        ];
    }
}
