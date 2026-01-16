<?php

namespace App\Livewire\Blog;

use App\Livewire\FrontendComponent;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('components.layouts.app.frontend', ['title' => 'Profile'])]
class ProfilePosts extends FrontendComponent
{
    use WithPagination;

    public $user;

    public $username;

    public $isCurrentUser = false;

    public function mount($username)
    {
        $this->username = $username;

        // Find user by name
        $this->user = User::where('name', $username)->firstOrFail();

        // Check if viewing own profile
        $this->isCurrentUser = Auth::check() && Auth::id() === $this->user->id;
    }

    public function render()
    {
        // Get posts for this user from blog_posts table
        $posts = BlogPost::where('user_id', $this->user->id)
            ->where('approved', 1) // Only show approved posts
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.blog.profile-posts', [
            'posts' => $posts,
        ]);
    }
}
