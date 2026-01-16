<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Component;

class BlogPostList extends Component
{
    public $sortBy = 'latest';

    public function sortByUpvotes()
    {
        $this->sortBy = 'upvotes';
    }

    public function sortByLatest()
    {
        $this->sortBy = 'latest';
    }

    public function render()
    {
        if ($this->sortBy == 'upvotes') {
            $posts = BlogPost::with('votes')->get()->sortByDesc(function ($post) {
                return $post->votes->sum('vote');
            });
        } else {
            $posts = BlogPost::with('votes')->latest()->get();
        }

        return view('livewire.blog-post-list', ['posts' => $posts]);
    }
}
