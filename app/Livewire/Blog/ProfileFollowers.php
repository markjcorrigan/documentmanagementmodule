<?php

namespace App\Livewire\Blog;

use App\Livewire\FrontendComponent;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Followers'])]
class ProfileFollowers extends FrontendComponent
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
     * Remove a follower from the current user's followers
     * Only the profile owner can remove their followers
     */
    public function removeFollower($followerId)
    {
        if (! $this->isCurrentUser) {
            session()->flash('error', 'You can only remove your own followers');

            return;
        }

        Follow::where([
            ['user_id', '=', $followerId],
            ['followeduser', '=', $this->user->id],
        ])->delete();

        session()->flash('success', 'Follower removed');
    }

    /**
     * Unfollow a user
     * Any authenticated user can unfollow someone they're following
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
     * Follow back a user who is following you
     */
    public function followBack($userId)
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

        session()->flash('success', 'Now following user');
    }

    public function render()
    {
        // Get all followers of this user using the existing relationship
        $followers = $this->user->followers()->with('userDoingTheFollowing')->get();

        return view('livewire.blog.profile-followers', [
            'followers' => $followers,
        ]);
    }
}
