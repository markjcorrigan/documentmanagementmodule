<?php

namespace App\Livewire;

use App\Http\Controllers\DocumentController;
use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class SearchDocs extends Component
{
    use WithPagination;  // Use the pagination trait

    public $searchTerm = '';

    public function updatedSearchTerm()
    {
        $this->resetPage(); // Reset pagination when search term changes
    }

    public function deleteDocument($id)
    {
        $documentController = new DocumentController;
        $documentController->destroy($id);
        // You can also add some logic to refresh the search results after deletion
    }

    public function render()
    {
        $documents = $this->searchTerm !== ''
            ? Document::query()
                ->where('name', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('shortname', 'like', '%'.$this->searchTerm.'%')
                ->paginate(10) // Paginate results
            : collect(); // Empty collection when search term is empty

        return view('livewire.search-docs', ['documents' => $documents]);
    }
}
