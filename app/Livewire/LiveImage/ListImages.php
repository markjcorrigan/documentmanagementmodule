<?php

namespace App\Livewire\LiveImage;

use App\Livewire\FrontendComponent;
use App\Models\Image;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\WithPagination;

#[Layout('components.layouts.app.frontend', ['title' => 'List Images'])]
class ListImages extends FrontendComponent
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
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

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('shortname', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        $images = $query->orderBy('name')->paginate(10);

        return view('livewire.live-image.list-images', [
            'images' => $images,
        ]);
    }
}
