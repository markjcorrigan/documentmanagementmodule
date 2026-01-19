<?php

namespace App\Livewire\Blog;

use App\Livewire\FrontendComponent;
use App\Models\BlogPost;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

#[Layout('components.layouts.app.frontend', ['title' => 'Edit Post'])]
class EditPost extends FrontendComponent
{
   // use LivewireAlert, WithFileUploads;

    public BlogPost $post;

    #[Validate('required|min:3|max:255')]
    public $post_title = '';

    #[Validate('required|min:10')]
    public $post_description = '';

    #[Validate('nullable|string|max:500')]
    public $post_tags = '';

    #[Validate('nullable|image|max:2048')]
    public $photo;

    public $currentPhoto;

    public function mount(BlogPost $post)
    {
        // Check authorization
        if ($post->user_id !== auth()->id()) {
            $this->alert('error', 'Unauthorized action.');

            return $this->redirect('/blog', navigate: true);
        }

        $this->post = $post;
        $this->post_title = $post->post_title;
        $this->post_description = $post->post_description;
        $this->post_tags = $post->post_tags;
        $this->currentPhoto = $post->photo;
    }

    public function update()
    {
        $this->validate();

        // Generate slug if title changed
        $slug = Str::slug($this->post_title);

        // Make slug unique if it already exists (excluding current post)
        $originalSlug = $slug;
        $counter = 1;
        while (BlogPost::where('post_slug', $slug)->where('id', '!=', $this->post->id)->exists()) {
            $slug = $originalSlug.'-'.$counter;
            $counter++;
        }

        // Handle photo upload
        $photoName = $this->post->photo;
        if ($this->photo) {
            // Delete old photo if exists
            if ($this->post->photo && file_exists(storage_path('app/public/images/'.$this->post->photo))) {
                unlink(storage_path('app/public/images/'.$this->post->photo));
            }

            $photoName = 'blogpostimage_'.time().'.'.$this->photo->getClientOriginalExtension();
            $this->photo->storeAs('images', $photoName, 'public');
        }

        // Update post
        $this->post->update([
            'post_title' => $this->post_title,
            'post_description' => $this->post_description,
            'post_slug' => $slug,
            'post_tags' => $this->post_tags,
            'photo' => $photoName,
        ]);

        $this->alert('success', 'Post updated successfully!');

        return $this->redirect('/blog/post/'.$this->post->id, navigate: true);
    }

    public function render(): View
    {
        return view('livewire.blog.edit-post');
    }
}
