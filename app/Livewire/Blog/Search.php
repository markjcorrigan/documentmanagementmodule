<?php

namespace App\Livewire\Blog;

use App\Models\BlogPost;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm = '';

    public $results = [];

    public function updatedSearchTerm()
    {
        if (strlen($this->searchTerm) < 2) {
            $this->results = [];

            return;
        }

        // Search in blog posts table
        $this->results = BlogPost::where(function ($query) {
            $query->where('post_title', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('post_description', 'like', '%'.$this->searchTerm.'%');
        })
            ->with('user')
            ->latest()
            ->limit(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.blog.search');
    }
}
