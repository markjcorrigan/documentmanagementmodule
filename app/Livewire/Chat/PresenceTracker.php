<?php

namespace App\Livewire\Chat;

use App\Models\OnlineUser;
use Livewire\Component;

class PresenceTracker extends Component
{
    public function mount(): void
    {
        $this->updatePresence();
    }

    public function updatePresence(): void
    {
        if (! auth()->check()) {
            return;
        }

        // Update user's last seen timestamp
        OnlineUser::updatePresence(auth()->id());

        // No need to manually broadcast - presence channel handles this
    }

    public function getListeners()
    {
        return [
            'echo:online-users,here' => 'updatePresence',
            'echo:online-users,joining' => 'updatePresence',
            'echo:online-users,leaving' => 'updatePresence',
        ];
    }

    public function render()
    {
        return <<<'HTML'
        <div style="display: none;">
            <!-- Silent presence tracker -->
        </div>
        HTML;
    }
}
