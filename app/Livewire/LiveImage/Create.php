<?php

namespace App\Livewire\LiveImage;

use App\Livewire\FrontendComponent;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

#[Layout('components.layouts.app.frontend', ['title' => 'Create'])]
class Create extends FrontendComponent
{
    use WithFileUploads;

    public $showModal = false;
    public $name = '';
    public $shortname = '';
    public $description = '';
    public $file;

    protected $rules = [
        'name' => 'required|string|max:255',
        'shortname' => 'nullable|string|max:255|alpha_dash',
        'description' => 'nullable|string',
        'file' => 'required|file|mimes:jpg,jpeg,png,gif,bmp,svg,webp,tiff,ico,psd|max:10240',
    ];

    protected $messages = [
        'shortname.alpha_dash' => 'The shortname may only contain letters, numbers, dashes and underscores.',
    ];

    #[On('open-create-modal')]
    public function openModal()
    {
        $this->resetValidation();
        $this->reset(['name', 'shortname', 'description', 'file']);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['name', 'shortname', 'description', 'file']);
    }

    public function updatedName()
    {
        if (empty($this->shortname)) {
            $this->shortname = Str::slug($this->name);
        }
    }

    public function save()
    {
        $this->validate();

        try {
            // Store file
            $filename = $this->file->getClientOriginalName();
            $path = $this->file->storeAs('images', $filename, 'public');

            // Get extension
            $extension = strtolower($this->file->getClientOriginalExtension());

            // Create image record
            Image::create([
                'name' => $this->name,
                'shortname' => $this->shortname ?: Str::slug($this->name),
                'description' => $this->description,
                'path' => $path,
                'extension' => $extension,
            ]);

            session()->flash('message', 'Image uploaded successfully!');
            $this->dispatch('image-created');
            $this->closeModal();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to upload image: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.live-image.create');
    }
}
