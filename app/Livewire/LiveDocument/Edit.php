<?php

namespace App\Livewire\LiveDocument;

use App\Livewire\FrontendComponent;
use App\Models\Document;

#[Layout('components.layouts.app.frontend')]
class Edit extends FrontendComponent
{
    public $isOpen = false;
    public $documentId;
    public $document;

    public $name;
    public $description;
    public $shortname;

    protected $rules = [
        'name' => 'required|string|max:255',
        'shortname' => 'required|string|max:30|alpha_dash',
        'description' => 'nullable|string|max:500',
    ];

    protected $messages = [
        'shortname.alpha_dash' => 'The shortname may only contain letters, numbers, dashes and underscores.',
    ];

    protected $listeners = ['openEditModal' => 'openModal'];

    public function openModal($documentId)
    {
        $this->documentId = $documentId;
        $this->document = Document::findOrFail($documentId);

        $this->name = $this->document->name;
        $this->shortname = $this->document->shortname;
        $this->description = $this->document->description ?? '';

        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->reset(['name', 'description', 'shortname', 'documentId', 'document']);
        $this->resetValidation();
    }

    public function update()
    {
        $this->validate();

        try {
            $document = Document::findOrFail($this->documentId);

            $document->update([
                'name' => $this->name,
                'shortname' => $this->shortname,
                'description' => $this->description,
            ]);

            $this->closeModal();
            $this->dispatch('document-updated');

            session()->flash('message', 'Document updated successfully!');

        } catch (\Exception $e) {
            \Log::error('Document update failed: ' . $e->getMessage());
            session()->flash('error', 'Failed to update document. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.live-document.edit');
    }
}
