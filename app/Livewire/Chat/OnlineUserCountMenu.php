<?php

namespace App\Livewire\Chat;

use App\Models\OnlineUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OnlineUserCountMenu extends Component
{
    public $onlineCount = 0;

    protected $listeners = [
        'presence-here' => 'updateFromPresence',
        'presence-joining' => 'incrementCount',
        'presence-leaving' => 'decrementCount',
    ];

    public function mount()
    {
        $this->updateCount();
    }

    public function updateCount()
    {
        if (! Auth::check()) {
            $this->onlineCount = 0;

            return;
        }

        $this->onlineCount = OnlineUser::where('last_seen_at', '>=', now()->subMinutes(5))
            ->where('user_id', '!=', Auth::id())
            ->count();
    }

    public function updateFromPresence($data)
    {
        $this->onlineCount = $data['count'] ?? 0;
    }

    public function incrementCount($data)
    {
        $user = $data['user'] ?? null;
        if ($user && $user['id'] !== Auth::id()) {
            $this->onlineCount++;
        }
    }

    public function decrementCount($data)
    {
        $user = $data['user'] ?? null;
        if ($user && $user['id'] !== Auth::id()) {
            $this->onlineCount = max(0, $this->onlineCount - 1);
        }
    }

    public function render()
    {
        return view('livewire.chat.online-user-count-menu');
    }
}
