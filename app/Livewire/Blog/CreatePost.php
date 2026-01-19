<?php

namespace App\Livewire\Blog;

use App\Livewire\FrontendComponent;
use App\Models\BlogPost;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

#[Layout('components.layouts.app.frontend', ['title' => 'Create New Post'])]
class CreatePost extends FrontendComponent
{
   // use LivewireAlert, WithFileUploads;

    #[Validate('required|min:3|max:255')]
    public $post_title = '';

    #[Validate('required|min:10')]
    public $post_description = '';

    #[Validate('nullable|string|max:500')]
    public $post_tags = '';

    #[Validate('nullable|image|max:2048')]
    public $photo;

    public function save()
    {
        $this->validate();

        // Generate slug
        $slug = Str::slug($this->post_title);

        // Make slug unique if it already exists
        $originalSlug = $slug;
        $counter = 1;
        while (BlogPost::where('post_slug', $slug)->exists()) {
            $slug = $originalSlug.'-'.$counter;
            $counter++;
        }

        // Handle photo upload
        $photoName = null;
        if ($this->photo) {
            $photoName = 'blogpostimage_'.time().'.'.$this->photo->getClientOriginalExtension();
            $this->photo->storeAs('images', $photoName, 'public');
        }

        // Create post
        $post = BlogPost::create([
            'user_id' => auth()->id(),
            'post_title' => $this->post_title,
            'post_description' => $this->post_description,
            'post_slug' => $slug,
            'post_tags' => $this->post_tags,
            'photo' => $photoName,
            'approved' => 0, // Auto-approve for now
        ]);

        $this->alert('success', 'Post created successfully!');

        return $this->redirect('/blog/post/'.$post->id, navigate: true);
    }

    public function render(): View
    {
        return view('livewire.blog.create-post');
    }
}
