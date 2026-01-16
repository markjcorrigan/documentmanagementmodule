<?php

namespace App\Livewire\LiveDocument;

use App\Livewire\FrontendComponent;
use Livewire\WithPagination;
use App\Models\Document;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;

#[Layout('components.layouts.app.frontend', ['title' => 'Live Documents'])]
class Index extends FrontendComponent
{
    use WithPagination;

    #[Url]
    public $search = '';

    #[Url]
    public $extension = '';

    #[Url]
    public $sortField = 'name';

    #[Url]
    public $sortDirection = 'asc';

    public $perPage = 10;

    public $showFilters = false;

    public $availableExtensions = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'extension' => ['except' => ''],
        'sortField' => ['except' => 'name'],
        'sortDirection' => ['except' => 'asc'],
    ];

    public function mount()
    {
        $this->loadAvailableExtensions();
    }

    public function loadAvailableExtensions()
    {
        $this->availableExtensions = Document::distinct('extension')
            ->whereNotNull('extension')
            ->pluck('extension')
            ->filter()
            ->sort()
            ->values()
            ->toArray();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedExtension()
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
        $this->search = '';
        $this->extension = '';
        $this->sortField = 'name';
        $this->sortDirection = 'asc';
        $this->resetPage();
    }

    #[On('document-created')]
    #[On('document-updated')]
    #[On('document-deleted')]
    public function refreshDocuments()
    {
        $this->loadAvailableExtensions();
        // This will trigger a re-render when CRUD operations happen
    }

    public function render()
    {
        $documents = Document::query()
            ->when($this->search, function($query) {
                return $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('shortname', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->extension, function($query) {
                return $query->where('extension', $this->extension);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.live-document.index', [
            'documents' => $documents,
            'totalCount' => Document::count(),
            'filteredCount' => $documents->total(),
        ]);
    }
}
