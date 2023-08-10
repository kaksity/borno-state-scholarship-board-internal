<?php

namespace App\Http\Requests\Admin\Web\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'old_password' => ['required', 'between:8,20'],
            'new_password' => ['required', 'between:8,20', 'confirmed'],
        ];
    }
}
