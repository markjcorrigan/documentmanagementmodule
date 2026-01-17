<?php

namespace App\Livewire\Documents;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class TrashedList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    
    // Selection properties
    public $selected = [];
    public $selectAll = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->resetPage();
    }

    // Handle "Select All" checkbox
    public function updatedSelectAll($value)
    {
        if ($value) {
            // Select all IDs on current page
            $this->selected = $this->documents->pluck('id')->map(fn($id) => (string) $id)->toArray();
        } else {
            $this->selected = [];
        }
    }

    // Handle individual checkbox changes
    public function updatedSelected()
    {
        // Update selectAll state based on whether all current page items are selected
        $this->selectAll = count($this->selected) === $this->documents->count();
    }

    public function clearSelection()
    {
        $this->selected = [];
        $this->selectAll = false;
    }

    // Bulk restore selected documents
    public function bulkRestore()
    {
        if (empty($this->selected)) {
            session()->flash('error', 'No documents selected.');
            return;
        }

        $count = Document::onlyTrashed()
            ->whereIn('id', $this->selected)
            ->restore();

        $this->clearSelection();
        
        session()->flash('success', "Successfully restored {$count} document(s).");
        
        $this->dispatch('document-restored');
    }

    // Bulk force delete selected documents
    public function bulkForceDelete()
    {
        if (empty($this->selected)) {
            session()->flash('error', 'No documents selected.');
            return;
        }

        $documents = Document::onlyTrashed()
            ->whereIn('id', $this->selected)
            ->get();

        $count = 0;
        foreach ($documents as $document) {
            // Delete physical file
            if ($document->path && \Storage::disk('public')->exists('assets/' . $document->name)) {
                \Storage::disk('public')->delete('assets/' . $document->name);
            }
            
            // Force delete from database
            $document->forceDelete();
            $count++;
        }

        $this->clearSelection();
        
        session()->flash('success', "Successfully deleted {$count} document(s) permanently.");
        
        $this->dispatch('document-deleted');
    }

    public function getDocumentsProperty()
    {
        return Document::onlyTrashed()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('shortname', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('deleted_at', 'desc')
            ->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.documents.trashed-list', [
            'documents' => $this->documents,
        ]);
    }
}
