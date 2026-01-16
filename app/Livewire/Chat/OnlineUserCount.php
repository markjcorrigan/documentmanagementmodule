<?php

namespace App\Livewire\Chat;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OnlineUserCount extends Component
{
    public $onlineCount = 0;

    protected $listeners = [
        'echo:online-users,here' => 'handlePresenceHere',
        'echo:online-users,joining' => 'handlePresenceJoining',
        'echo:online-users,leaving' => 'handlePresenceLeaving',
    ];

    public function mount()
    {
        // Start with 0, will be updated via presence events
        $this->onlineCount = 0;
    }

    public function updateCount()
    {
        // This method is called by wire:poll
        // The count is already being updated by presence events
        // This just forces a re-render periodically as a fallback
    }

    public function handlePresenceHere($users)
    {
        $otherUsers = array_filter($users, function ($user) {
            return $user['id'] !== Auth::id();
        });
        $this->onlineCount = count($otherUsers);
    }

    public function handlePresenceJoining($user)
    {
        if ($user['id'] !== Auth::id()) {
            $this->onlineCount++;
        }
    }

    public function handlePresenceLeaving($user)
    {
        if ($user['id'] !== Auth::id()) {
            $this->onlineCount = max(0, $this->onlineCount - 1);
        }
    }

    public function render()
    {
        return view('livewire.chat.online-user-count');
    }
}
