<?php

namespace App\Livewire\Documents;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentList extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 20;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $filterExtension = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'filterExtension' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterExtension()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function clearFilters()
    {
        $this->reset(['search', 'filterExtension']);
        $this->resetPage();
    }

    public function render()
    {
        $query = Document::query();

        // Apply search
        if ($this->search) {
            $query->search($this->search);
        }

        // Apply extension filter
        if ($this->filterExtension) {
            $query->where('extension', $this->filterExtension);
        }

        // Apply sorting
        $query->orderBy($this->sortField, $this->sortDirection);

        $documents = $query->paginate($this->perPage);

        // Get unique extensions for filter dropdown
        $extensions = Document::select('extension')
            ->distinct()
            ->orderBy('extension')
            ->pluck('extension');

        return view('livewire.documents.document-list', [
            'documents' => $documents,
            'extensions' => $extensions,
        ]);
    }
}
