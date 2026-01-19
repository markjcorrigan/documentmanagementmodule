<?php

namespace App\Livewire\Blog;

use App\Livewire\FrontendComponent;
use App\Models\BlogPost;
use Illuminate\View\View;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Single Post'])]
class SinglePost extends FrontendComponent
{
    //use LivewireAlert;

    public BlogPost $post;

    public function mount(BlogPost $post)
    {
        $this->post = $post;
    }

    //    #[Layout('components.layouts.app.frontend')]
    public function render(): View
    {
        // Dynamic title based on post
        return view('livewire.blog.single-post')
            ->title($this->post->post_title.' | PMWay Blog');
    }

    public function deletePost()
    {
        // Check authorization
        if ($this->post->user_id !== auth()->id()) {
            $this->alert('error', 'Unauthorized action.');

            return;
        }

        // Delete photo if exists
        if ($this->post->photo && file_exists(storage_path('app/public/images/'.$this->post->photo))) {
            unlink(storage_path('app/public/images/'.$this->post->photo));
        }

        $this->post->delete();

        $this->alert('success', 'Post deleted successfully!');

        return $this->redirect('/blog', navigate: true);
    }
}
