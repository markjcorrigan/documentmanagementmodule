<?php

namespace App\Livewire\Documents;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class TrashedDocuments extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 20;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function restore($id)
    {
        $document = Document::withTrashed()->findOrFail($id);
        $document->restore();

        session()->flash('success', 'Document restored successfully!');
    }

    public function forceDelete($id)
    {
        $document = Document::withTrashed()->findOrFail($id);
        
        // Delete physical file
        $fullPath = storage_path('app/public/assets/' . $document->name);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
        
        $document->forceDelete();

        session()->flash('success', 'Document permanently deleted!');
    }

    public function render()
    {
        $query = Document::onlyTrashed();

        // Apply search
        if ($this->search) {
            $query->search($this->search);
        }

        $query->orderBy('deleted_at', 'desc');

        $documents = $query->paginate($this->perPage);

        return view('livewire.documents.trashed-documents', [
            'documents' => $documents,
        ]);
    }
}
