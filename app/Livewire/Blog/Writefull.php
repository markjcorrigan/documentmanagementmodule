<?php

namespace App\Livewire\Blog;

use App\Livewire\FrontendComponent;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('components.layouts.app.frontend', ['title' => 'Blog Feed'])]
class Writefull extends FrontendComponent
{
    use WithPagination;

    public function render(): View
    {
        $followingCount = Auth::user()->followingTheseUsers()->count();

        if ($followingCount === 0) {
            // DISCOVERY MODE: Show ALL approved posts when not following anyone
            $posts = BlogPost::where('approved', 1)
                ->with('user')
                ->latest()
                ->paginate(10);

            $mode = 'discovery';
        } else {
            // FEED MODE: Show only posts from people you follow
            $posts = BlogPost::where('approved', 1)
                ->whereIn('user_id', function ($query) {
                    $query->select('followeduser')
                        ->from('follows')
                        ->where('user_id', Auth::id());
                })
                ->with('user')
                ->latest()
                ->paginate(10);

            $mode = 'following';
        }

        return view('livewire.blog.writefull', [
            'posts' => $posts,
            'mode' => $mode,
            'followingCount' => $followingCount,
        ]);
    }
}
