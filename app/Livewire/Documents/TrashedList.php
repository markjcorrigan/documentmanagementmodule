<?php

namespace App\Livewire\Documents;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class TrashedList extends Component
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

    public function clearSearch()
    {
        $this->reset(['search']);
        $this->resetPage();
    }

    public function render()
    {
        $query = Document::onlyTrashed();

        // Apply search
        if ($this->search) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('shortname', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        $documents = $query->orderBy('deleted_at', 'desc')->paginate($this->perPage);

        return view('livewire.documents.trashed-list', [
            'documents' => $documents,
        ]);
    }
}