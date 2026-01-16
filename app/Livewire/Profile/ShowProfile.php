<?php

namespace App\Livewire\Profile;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app.frontend', ['title' => 'User Profile'])]
class ShowProfile extends Component
{
    public $sharedData;

    public $doctitle;

    public function mount($username)
    {
        // Your existing logic to fetch user data
        // Example:
        // $user = User::where('name', $username)->firstOrFail();

        $this->sharedData = [
            'name' => $username,
            'avatar' => '/path/to/avatar.jpg', // Your avatar logic
            'postCount' => 0, // Your count logic
            'followerCount' => 0,
            'followingCount' => 0,
            'currentlyFollowing' => false,
        ];

        $this->doctitle = $username."'s Profile";
    }

    public function render()
    {
        return view('livewire.profile.show-profile');
    }
}
