<?php

namespace App\Livewire\Blog;

use App\Livewire\FrontendComponent;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Following'])]
class ProfileFollowing extends FrontendComponent
{
    public $user;

    public $username;

    public $isCurrentUser = false;

    public function mount($username)
    {
        $this->username = $username;
        $this->user = User::where('name', $username)->firstOrFail();
        $this->isCurrentUser = Auth::check() && Auth::id() === $this->user->id;
    }

    /**
     * Unfollow a user
     * Can be called by the profile owner or any authenticated user
     */
    public function unfollow($userId)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        Follow::where([
            ['user_id', '=', Auth::id()],
            ['followeduser', '=', $userId],
        ])->delete();

        session()->flash('success', 'User unfollowed');
    }

    /**
     * Follow a user
     * Any authenticated user can follow another user (except themselves)
     */
    public function followUser($userId)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        // Can't follow yourself
        if ($userId == Auth::id()) {
            session()->flash('error', 'You cannot follow yourself');

            return;
        }

        // Check if already following
        $existCheck = Follow::where([
            ['user_id', '=', Auth::id()],
            ['followeduser', '=', $userId],
        ])->count();

        if ($existCheck) {
            session()->flash('error', 'You are already following this user');

            return;
        }

        $newFollow = new Follow;
        $newFollow->user_id = Auth::id();
        $newFollow->followeduser = $userId;
        $newFollow->save();

        session()->flash('success', 'User followed');
    }

    public function render()
    {
        // Get all users that this user is following using the existing relationship
        $following = $this->user->followingTheseUsers()->with('userBeingFollowed')->get();

        return view('livewire.blog.profile-following', [
            'following' => $following,
        ]);
    }
}
