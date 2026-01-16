<?php

namespace App\Livewire\LiveDocument;

use App\Livewire\FrontendComponent;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

#[Layout('components.layouts.app.frontend')]
class Delete extends FrontendComponent
{
    public $isOpen = false;
    public $documentId;
    public $document;

    protected $listeners = ['openDeleteModal' => 'openModal'];

    public function openModal($documentId)
    {
        $this->documentId = $documentId;
        $this->document = Document::findOrFail($documentId);
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->reset(['documentId', 'document']);
    }

    public function delete($confirmText)
    {
        // Validate confirmation text
        if (trim($confirmText) !== 'DELETE') {
            $this->dispatch('show-delete-error', message: 'Please type DELETE to confirm.');
            return;
        }

        try {
            $document = Document::findOrFail($this->documentId);
            $documentName = $document->name;
            
            // Delete the file from storage
            if ($document->path && Storage::disk('public')->exists($document->path)) {
                Storage::disk('public')->delete($document->path);
            }
            
            // Delete the database record
            $document->delete();

            // Close modal and notify
            $this->closeModal();
            $this->dispatch('document-deleted');

            session()->flash('message', "Document '{$documentName}' deleted successfully!");

        } catch (\Exception $e) {
            \Log::error('Document deletion failed: ' . $e->getMessage());
            $this->dispatch('show-delete-error', message: 'Failed to delete document. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.live-document.delete');
    }
}
