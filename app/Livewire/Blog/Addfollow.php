<?php

namespace App\Livewire\Blog;

use App\Livewire\FrontendComponent;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app.frontend', ['title' => 'Add Following'])]
class Addfollow extends FrontendComponent
{
    public $name;

    public $userId;

    public function mount($name)
    {
        $this->name = $name;
        $user = User::where('name', $name)->first();
        $this->userId = $user ? $user->id : null;
    }

    public function follow()
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        if (! $this->userId) {
            return;
        }

        // Can't follow yourself
        if ($this->userId == Auth::id()) {
            session()->flash('error', 'You cannot follow yourself');

            return;
        }

        // Check if already following
        $existCheck = Follow::where([
            ['user_id', '=', Auth::id()],
            ['followeduser', '=', $this->userId],
        ])->count();

        if ($existCheck) {
            session()->flash('error', 'You are already following this user');

            return;
        }

        // Create follow
        $newFollow = new Follow;
        $newFollow->user_id = Auth::id();
        $newFollow->followeduser = $this->userId;
        $newFollow->save();

        session()->flash('success', 'Now following '.$this->name);

        // Refresh the page to update buttons
        return redirect()->to(request()->header('Referer'));
    }

    public function render()
    {
        // Check if already following
        $isFollowing = false;
        if (Auth::check() && $this->userId) {
            $isFollowing = Follow::where([
                ['user_id', '=', Auth::id()],
                ['followeduser', '=', $this->userId],
            ])->exists();
        }

        return view('livewire.blog.addfollow', [
            'isFollowing' => $isFollowing,
        ]);
    }
}
