<?php

namespace App\Http\Requests\Documents;

use App\Models\Document;
use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'document' => [
                'required',
                'file',
                'max:204800', // 200MB
                function ($attribute, $value, $fail) {
                    $allowedExtensions = array_keys(Document::mimeTypes());
                    $extension = strtolower($value->getClientOriginalExtension());
                    
                    if (!in_array($extension, $allowedExtensions)) {
                        $fail("The document must be one of the following types: " . implode(', ', $allowedExtensions));
                    }
                },
            ],
            'shortname' => 'nullable|string|max:30|unique:documents,shortname',
            'description' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'document.required' => 'Please select a document to upload.',
            'document.file' => 'The uploaded file is not valid.',
            'document.max' => 'The document size cannot exceed 200MB.',
            'shortname.unique' => 'This shortname is already in use.',
        ];
    }
}