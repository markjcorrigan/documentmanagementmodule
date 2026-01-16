<?php

namespace App\Livewire\LiveImage;

use App\Livewire\FrontendComponent;
use App\Models\Image;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('components.layouts.app.frontend', ['title' => 'Edit'])]
class Edit extends FrontendComponent
{
    public $showModal = false;
    public $imageId;
    public $name = '';
    public $shortname = '';
    public $description = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'shortname' => 'required|string|max:255|alpha_dash',
        'description' => 'nullable|string',
    ];

    protected $messages = [
        'shortname.alpha_dash' => 'The shortname may only contain letters, numbers, dashes and underscores.',
    ];

    #[On('openEditModal')]
    public function openModal($imageId)
    {
        $this->imageId = $imageId;
        $image = Image::findOrFail($imageId);

        $this->name = $image->name;
        $this->shortname = $image->shortname;
        $this->description = $image->description;

        $this->resetValidation();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['imageId', 'name', 'shortname', 'description']);
    }

    public function update()
    {
        $this->validate();

        try {
            $image = Image::findOrFail($this->imageId);

            $image->update([
                'name' => $this->name,
                'shortname' => $this->shortname,
                'description' => $this->description,
            ]);

            session()->flash('message', 'Image updated successfully!');
            $this->dispatch('image-updated');
            $this->closeModal();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update image: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $image = $this->imageId ? Image::find($this->imageId) : null;

        return view('livewire.live-image.edit', [
            'image' => $image,
        ]);
    }
}
