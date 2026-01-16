<?php

// LW Post List Controller

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $name;

    public function mount($name)
    {
        $this->name = $name;
    }

    public function render()
    {
        $posts = BlogPost::whereHas('user', function ($query) {
            $query->where('name', $this->name);
        })->where('approved', 1)->paginate(10);

        $approvedPostCount = $posts->total();

        return view('livewire.post-list', [
            'posts' => $posts,
            'approvedPostCount' => $approvedPostCount,
        ]);
    }

    public function gotoPage($page)
    {
        $this->setPage($page);
    }
}
