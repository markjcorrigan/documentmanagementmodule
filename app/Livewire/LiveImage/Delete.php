<?php

namespace App\Livewire\LiveImage;

use App\Livewire\FrontendComponent;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;

#[Layout('components.layouts.app.frontend', ['title' => 'Delete'])]
class Delete extends FrontendComponent
{
    public $showModal = false;
    public $imageId;
    public $imageName = '';

    #[On('openDeleteModal')]
    public function openModal($imageId)
    {
        $this->imageId = $imageId;
        $image = Image::findOrFail($imageId);
        $this->imageName = $image->name;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['imageId', 'imageName']);
    }

    public function delete($confirmText)
    {
        if (trim($confirmText) !== 'DELETE') {
            $this->dispatch('show-delete-error', message: 'Please type "DELETE" to confirm');
            return;
        }

        try {
            $image = Image::findOrFail($this->imageId);

            // Delete file from storage
            if ($image->path && Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }

            // Delete database record
            $image->delete();

            session()->flash('message', 'Image deleted successfully!');
            $this->dispatch('image-deleted');
            $this->closeModal();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete image: ' . $e->getMessage());
            $this->closeModal();
        }
    }

    public function render()
    {
        $image = $this->imageId ? Image::find($this->imageId) : null;

        return view('livewire.live-image.delete', [
            'image' => $image,
        ]);
    }
}
