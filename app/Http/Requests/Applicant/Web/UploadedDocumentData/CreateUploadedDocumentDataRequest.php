<?php

namespace App\Http\Requests\Applicant\Web\UploadedDocumentData;

use Illuminate\Foundation\Http\FormRequest;

class CreateUploadedDocumentDataRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'document_type_id' => ['required', 'integer'],
            'file' => ['required', 'file', 'max:1024', 'image'],
        ];
    }

    public function messages()
    {
        return [
            'document_type_id.required' => 'Qualification Type is required',
            'document_type_id.integer' => 'Qualification Type is not valid',
            'file.required' => 'Document is required',
            'file.file' => 'Document must be a file',
            'file.max' => 'Document must not exceed 1mb',
            'file.image' => 'Document must be an image',
        ];
    }
}
