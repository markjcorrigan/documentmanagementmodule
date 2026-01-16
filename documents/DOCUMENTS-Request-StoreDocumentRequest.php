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
            'document' => 'required|file|mimes:' . implode(',', array_keys(Document::mimeTypes())) . '|max:204800',
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
            'document.mimes' => 'The document must be a valid file type: ' . implode(', ', array_keys(Document::mimeTypes())),
            'document.max' => 'The document size cannot exceed 200MB.',
            'shortname.unique' => 'This shortname is already in use.',
        ];
    }
}
