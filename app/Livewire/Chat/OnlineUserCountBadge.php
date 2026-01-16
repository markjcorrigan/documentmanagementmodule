<?php

namespace App\Livewire\Chat;

use App\Models\OnlineUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OnlineUserCountBadge extends Component
{
    protected $listeners = ['refreshOnlineUsers' => '$refresh'];

    public function updateCount()
    {
        // This method is called by wire:poll to refresh the count
        // Livewire will automatically re-render the component
    }

    public function getOnlineCountProperty()
    {
        if (! Auth::check()) {
            return 0;
        }

        return OnlineUser::where('last_seen_at', '>=', now()->subMinutes(5))
            ->where('user_id', '!=', Auth::id())
            ->count();
    }

    public function render()
    {
        return view('livewire.chat.online-user-count-badge');
    }
}
