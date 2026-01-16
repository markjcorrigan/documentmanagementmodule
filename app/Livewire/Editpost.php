<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mews\Purifier\Facades\Purifier;

#[Layout('components.layouts.app.frontend', ['title' => 'Edit Post'])]
class Editpost extends Component
{
    use WithFileUploads;

    public $post;

    public $post_title;

    public $post_description;

    public $post_tags;

    public $photo;

    public function mount(BlogPost $post)
    {
        $this->post = $post;
        $this->post_title = $post->post_title;
        $this->post_description = $post->post_description;
        $this->post_tags = $post->post_tags;
    }

    public function save()
    {
        $this->validate([
            'post_title' => 'required',
            'post_description' => 'required',
            'post_tags' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp,bmp,ico,tiff|max:5120', // Updated validation
        ]);

        $post = BlogPost::find($this->post->id);
        $post->post_title = $this->post_title;
        $post->post_description = Purifier::clean($this->post_description);
        $post->post_tags = $this->post_tags;
        $post->post_slug = strtolower(str_replace(' ', '_', $this->post_title));

        if ($this->photo) {
            // Define the correct storage path
            $storagePath = storage_path('app/public/images/'); // Fixed path

            // Create directory if it doesn't exist
            if (! File::exists($storagePath)) {
                File::makeDirectory($storagePath, 0777, true);
            }

            // Get original filename and extension
            $originalName = pathinfo($this->photo->getClientOriginalName(), PATHINFO_FILENAME);
            $originalExtension = strtolower($this->photo->getClientOriginalExtension()); // Added strtolower

            // Create new filename with prefix
            $imageName = 'blogpostimage_'.$originalName.'.'.$originalExtension;

            // Check if file already exists and delete it
            $fullPath = $storagePath.$imageName;
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }

            // Process image with Intervention Image
            $manager = new ImageManager(new Driver);
            $img = $manager->read($this->photo->getRealPath());
            $img = $img->resize(409, 368);

            // Save the image in its original format with quality settings
            switch ($originalExtension) {
                case 'jpg':
                case 'jpeg':
                    $img->save($storagePath.$imageName, 85); // 85% quality for JPEG
                    break;
                case 'png':
                    $img->save($storagePath.$imageName); // PNG keeps transparency
                    break;
                case 'webp':
                    $img->save($storagePath.$imageName, 85); // 85% quality for WebP
                    break;
                case 'gif':
                    // For GIF, we might want to keep it as is or convert if it's too large
                    if ($this->photo->getSize() > 1024000) { // If larger than 1MB
                        $imageName = 'blogpostimage_'.$originalName.'.webp';
                        $img->save($storagePath.$imageName, 85); // Convert large GIFs to WebP
                    } else {
                        // Keep original GIF for small files
                        $this->photo->storeAs('public/images', $imageName);
                    }
                    break;
                default:
                    // For other formats (bmp, ico, tiff), save as WebP for better compatibility
                    $imageName = 'blogpostimage_'.$originalName.'.webp';
                    $img->save($storagePath.$imageName, 85);
                    break;
            }

            // Store filename in database
            $post->photo = $imageName;
        }

        $post->save();

        session()->flash('success', 'Post successfully updated');

        return $this->redirect('/profile/'.auth()->user()->name, navigate: true);
    }

    public function render()
    {
        return view('livewire.editpost');
    }
}
