<?php

namespace App\Livewire\LiveImage;

use App\Livewire\FrontendComponent;
use App\Models\Image;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\WithPagination;

#[Layout('components.layouts.app.frontend', ['title' => 'Index'])]
class Index extends FrontendComponent
{
    use WithPagination;

    public $search = '';
    public $extension = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $perPage = 12;
    public $showFilters = false;

    protected $queryString = [
        'search' => ['except' => ''],
        'extension' => ['except' => ''],
        'sortField' => ['except' => 'name'],
        'sortDirection' => ['except' => 'asc'],
        'perPage' => ['except' => 12],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingExtension()
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
        $this->reset(['search', 'extension', 'sortField', 'sortDirection']);
        $this->resetPage();
    }

    #[On('image-created')]
    #[On('image-updated')]
    #[On('image-deleted')]
    public function refreshList()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Image::query();

        // Search
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('shortname', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        // Filter by extension
        if ($this->extension) {
            $query->where('extension', $this->extension);
        }

        // Sort
        $query->orderBy($this->sortField, $this->sortDirection);

        // Get images
        $images = $query->paginate($this->perPage);

        // Get available extensions for filter
        $availableExtensions = Image::select('extension')
            ->distinct()
            ->whereNotNull('extension')
            ->orderBy('extension')
            ->pluck('extension');

        // Get counts for header
        $totalCount = Image::count();
        $filteredCount = $this->search || $this->extension ? $query->count() : null;

        return view('livewire.live-image.index', [
            'images' => $images,
            'availableExtensions' => $availableExtensions,
            'totalCount' => $totalCount,
            'filteredCount' => $filteredCount,
        ]);
    }
}
