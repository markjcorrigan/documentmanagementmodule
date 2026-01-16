<?php

namespace App\Http\Requests\Documents;

use App\Models\Document;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
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
        $documentId = $this->route('document')->id;

        return [
            'document' => 'nullable|file|mimes:' . implode(',', array_keys(Document::mimeTypes())) . '|max:204800',
            'shortname' => 'required|string|max:30|unique:documents,shortname,' . $documentId,
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
            'document.file' => 'The uploaded file is not valid.',
            'document.mimes' => 'The document must be a valid file type: ' . implode(', ', array_keys(Document::mimeTypes())),
            'document.max' => 'The document size cannot exceed 200MB.',
            'shortname.required' => 'The shortname field is required.',
            'shortname.unique' => 'This shortname is already in use.',
        ];
    }
}
