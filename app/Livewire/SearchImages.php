<?php

namespace App\Livewire;

use App\Http\Controllers\ImageController;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithPagination;

class SearchImages extends Component
{
    use WithPagination;  // Use the pagination trait

    public $searchTerm = '';

    public function updatedSearchTerm()
    {
        $this->resetPage(); // Reset pagination when search term changes
    }

    public function deleteImage($id)
    {
        $imageController = new ImageController;
        $imageController->destroy($id);
        // You can also add some logic to refresh the search results after deletion
    }

    public function render()
    {
        $images = $this->searchTerm !== ''
            ? Image::query()
                ->where('name', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('shortname', 'like', '%'.$this->searchTerm.'%')
                ->paginate(10) // Paginate results
            : collect(); // Empty collection when search term is empty

        return view('livewire.search-images', ['images' => $images]);
    }
}
