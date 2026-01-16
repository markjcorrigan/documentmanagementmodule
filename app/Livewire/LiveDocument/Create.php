<?php

namespace App\Livewire\LiveDocument;

use App\Livewire\FrontendComponent;
use App\Models\Document;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

#[Layout('components.layouts.app.frontend')]
class Create extends FrontendComponent
{
    use WithFileUploads;

    public $isOpen = false;

    public $name;
    public $description;
    public $file;
    public $folder = 'assets';
    public $shortname;

    protected $listeners = ['open-create-modal' => 'openModal'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'shortname' => 'nullable|string|max:30|alpha_dash',
        'description' => 'nullable|string|max:500',
        'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,txt,jpg,jpeg,png,gif|max:10240', // 10MB max
        'folder' => 'required|string',
    ];

    protected $messages = [
        'file.mimes' => 'File must be a PDF, Word document, Excel file, text file, or image.',
        'file.max' => 'File must not be larger than 10MB.',
        'shortname.alpha_dash' => 'The shortname may only contain letters, numbers, dashes and underscores.',
    ];

    public function updatedFile()
    {
        $this->validate([
            'file' => 'file|mimes:pdf,doc,docx,xls,xlsx,txt,jpg,jpeg,png,gif|max:10240',
        ]);
    }

    public function updatedName()
    {
        // Auto-generate shortname from name if shortname is empty
        if (empty($this->shortname)) {
            $this->shortname = $this->generateShortname($this->name);
        }
    }

    private function generateShortname($name)
    {
        // Convert to slug and limit to 30 characters
        $slug = Str::slug($name);
        return Str::limit($slug, 30, '');
    }

    public function openModal()
    {
        $this->reset();
        $this->folder = 'assets'; // Reset to default
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->reset();
        $this->resetValidation();
    }

    public function save()
    {
        // Auto-generate shortname if not provided
        if (empty($this->shortname)) {
            $this->shortname = $this->generateShortname($this->name);
        }

        $this->validate();

        try {
            // Store file
            $path = $this->file->store($this->folder, 'public');

            // Create document record
            Document::create([
                'name' => $this->name,
                'shortname' => $this->shortname,
                'description' => $this->description,
                'path' => $path,
                'folder' => $this->folder,
                'extension' => $this->file->getClientOriginalExtension(),
            ]);

            $this->dispatch('document-created');
            $this->closeModal();

            session()->flash('message', 'Document uploaded successfully!');

        } catch (\Exception $e) {
            \Log::error('Document creation failed: ' . $e->getMessage());
            session()->flash('error', 'Failed to upload document. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.live-document.create');
    }
}
