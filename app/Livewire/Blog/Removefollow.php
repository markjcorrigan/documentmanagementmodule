<?php

namespace App\Livewire\Blog;

use App\Livewire\FrontendComponent;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Removefollow extends FrontendComponent
{
    public $name;

    public $userId;

    public function mount($name)
    {
        $this->name = $name;
        $user = User::where('name', $name)->first();
        $this->userId = $user ? $user->id : null;
    }

    public function unfollow()
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        if (! $this->userId) {
            return;
        }

        // Remove follow
        Follow::where([
            ['user_id', '=', Auth::id()],
            ['followeduser', '=', $this->userId],
        ])->delete();

        session()->flash('success', 'Unfollowed '.$this->name);

        // Refresh the page to update buttons
        return redirect()->to(request()->header('Referer'));
    }

    public function render()
    {
        // Check if currently following
        $isFollowing = false;
        if (Auth::check() && $this->userId) {
            $isFollowing = Follow::where([
                ['user_id', '=', Auth::id()],
                ['followeduser', '=', $this->userId],
            ])->exists();
        }

        return view('livewire.blog.removefollow', [
            'isFollowing' => $isFollowing,
        ]);
    }
}
