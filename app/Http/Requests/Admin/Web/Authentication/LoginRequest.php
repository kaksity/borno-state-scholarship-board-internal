<?php

namespace App\Http\Requests\Admin\Web\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email_address' => ['required', 'email'],
            'password' => ['required', 'between:8,20'],
            'remember_me' => ['nullable', 'string']
        ];
    }
}
