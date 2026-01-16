<?php

namespace App\Livewire\LiveDocument;

use App\Livewire\FrontendComponent;
use App\Models\Document;
use Livewire\WithPagination;

#[Layout('components.layouts.app.frontend')]
class ListDocuments extends FrontendComponent
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';

    protected $listeners = [
        'document-created' => '$refresh',
        'document-updated' => '$refresh',
        'document-deleted' => '$refresh',
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $documents = Document::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('shortname', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.live-document.list-documents', [
            'documents' => $documents,
        ]);
    }
}
