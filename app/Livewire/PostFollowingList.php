<?php

namespace App\Livewire;

use App\Models\BlogPost;
use Livewire\Component;
use Livewire\WithPagination;

class PostFollowingList extends Component
{
    use WithPagination;

    public $postCount;
    // public $notApprovedPostCount;

    public function render()
    {
        $posts = auth()->user()->feedPosts()->where('approved', 1)->latest()->paginate(10);
        // dd($posts);
        $postCount = BlogPost::where('approved', 1)->count();

        // $notApprovedPostCount = BlogPost::where('approved', 0)->count();
        // return view('livewire.post-following-list', ['posts' => $posts, 'postCount' => $postCount, 'notApprovedPostCount' => $notApprovedPostCount]);
        return view('livewire.post-following-list', ['posts' => $posts, 'postCount' => $postCount]);
    }
}
