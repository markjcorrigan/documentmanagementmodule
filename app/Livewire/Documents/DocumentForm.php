<?php

namespace App\Livewire\Documents;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithFileUploads;

class DocumentForm extends Component
{
    use WithFileUploads;

    public $document; // For edit mode
    public $documentFile;
    public $shortname;
    public $description;
    public $isEditMode = false;

    protected function rules()
    {
        $rules = [
            'shortname' => 'required|string|max:30',
            'description' => 'nullable|string|max:1000',
        ];

        if ($this->isEditMode) {
            $rules['documentFile'] = 'nullable|file|mimes:' . implode(',', array_keys(Document::mimeTypes())) . '|max:204800';
            $rules['shortname'] .= '|unique:documents,shortname,' . $this->document->id;
        } else {
            $rules['documentFile'] = 'required|file|mimes:' . implode(',', array_keys(Document::mimeTypes())) . '|max:204800';
            $rules['shortname'] .= '|unique:documents,shortname';
        }

        return $rules;
    }

    public function mount($document = null)
    {
        if ($document) {
            $this->isEditMode = true;
            $this->document = $document;
            $this->shortname = $document->shortname;
            $this->description = $document->description;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->isEditMode) {
            $this->updateDocument();
        } else {
            $this->createDocument();
        }
    }

    protected function createDocument()
    {
        if ($this->documentFile) {
            $originalName = $this->documentFile->getClientOriginalName();
            
            // Save to storage/app/public/assets
            $destinationPath = storage_path('app/public/assets');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $this->documentFile->storeAs('', $originalName, ['disk' => 'public_assets']);
            
            $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            
            Document::create([
                'name' => $originalName,
                'shortname' => $this->shortname,
                'path' => 'storage/assets/' . $originalName,
                'description' => $this->description ?? $this->shortname,
                'extension' => $ext,
            ]);

            session()->flash('success', 'Document uploaded successfully!');
            return redirect()->route('documents.index');
        }
    }

    protected function updateDocument()
    {
        $data = [
            'shortname' => $this->shortname,
            'description' => $this->description,
        ];

        // Handle file replacement if new file uploaded
        if ($this->documentFile) {
            // Delete old file
            $oldPath = storage_path('app/public/assets/' . $this->document->name);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            
            // Upload new file
            $originalName = $this->documentFile->getClientOriginalName();
            
            $destinationPath = storage_path('app/public/assets');
            $this->documentFile->storeAs('', $originalName, ['disk' => 'public_assets']);
            
            $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            
            $data['name'] = $originalName;
            $data['path'] = 'storage/assets/' . $originalName;
            $data['extension'] = $ext;
        }
        
        $this->document->update($data);

        session()->flash('success', 'Document updated successfully!');
        return redirect()->route('documents.index');
    }

    public function render()
    {
        return view('livewire.documents.document-form');
    }
}
