<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Component;

class SinglePost extends Component
{
    public $post;

    public $successMessage;

    public function mount(BlogPost $post)
    {
        $this->post = $post;
        $this->successMessage = request()->query('success');
    }

    public function delete()
    {
        $this->post->delete();
        session()->flash('message', 'Post deleted successfully.');

        return redirect()->to('/profile/'.auth()->user()->name);
    }

    public function render()
    {
        return view('livewire.singlepost');
    }
}
