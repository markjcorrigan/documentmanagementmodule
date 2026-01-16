<?php

namespace App\Livewire\Chat;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class OnlineUsers extends Component
{
    public Collection $onlineUsers;

    public array $onlineUserIds = [];

    public function mount(): void
    {
        $this->onlineUsers = collect([]);
        $this->onlineUserIds = [];

        // Initialize with currently online users from database (fallback)
        $this->loadOnlineUsers();
    }

    /**
     * Load online users from database (fallback)
     */
    private function loadOnlineUsers(): void
    {
        $onlineUsers = User::whereHas('onlineStatus', function ($query) {
            $query->where('last_seen_at', '>=', now()->subMinutes(5));
        })->where('id', '!=', auth()->id())->get();

        $this->onlineUsers = $onlineUsers;
        $this->onlineUserIds = $onlineUsers->pluck('id')->toArray();
    }

    /**
     * Listen for presence-here event from JavaScript
     */
    #[On('presence-here')]
    public function handlePresenceHere(...$params): void
    {
        \Log::info('🎯 OnlineUsers received presence-here', [
            'params' => $params,
            'current_user_id' => auth()->id(),
        ]);

        // Livewire wraps the data, so params[0] is the whole data object
        $data = $params[0] ?? [];

        // Check if 'users' key exists (it should)
        if (isset($data['users'])) {
            $users = $data['users'];
        } else {
            // Fallback: maybe the first param IS the users array directly
            $users = is_array($data) && isset($data[0]) ? $data : [];
        }

        \Log::info('👥 Processing users', [
            'raw_data' => $data,
            'extracted_users' => $users,
            'user_count' => count($users),
        ]);

        if (empty($users)) {
            $this->onlineUsers = collect([]);
            $this->onlineUserIds = [];
            \Log::info('⚠️ No users to display');

            return;
        }

        // Extract user IDs (filter out current user)
        // Use != instead of !== to handle string/int comparison
        $userIds = collect($users)
            ->pluck('id')
            ->map(fn ($id) => (int) $id) // Ensure integers
            ->filter(fn ($id) => $id != auth()->id())
            ->toArray();

        \Log::info('🔍 Filtered user IDs', [
            'raw_ids' => collect($users)->pluck('id')->toArray(),
            'current_user_id' => auth()->id(),
            'filtered_ids' => $userIds,
            'count' => count($userIds),
        ]);

        if (! empty($userIds)) {
            $this->onlineUsers = User::whereIn('id', $userIds)->orderBy('name')->get();
            $this->onlineUserIds = $userIds;
            \Log::info('✅ Loaded users from database', [
                'loaded_users' => $this->onlineUsers->pluck('name', 'id')->toArray(),
            ]);
        } else {
            $this->onlineUsers = collect([]);
            $this->onlineUserIds = [];
            \Log::info('⚠️ No user IDs after filtering');
        }
    }

    /**
     * Listen for presence-joining event from JavaScript
     */
    #[On('presence-joining')]
    public function handlePresenceJoining(...$params): void
    {
        $data = $params[0] ?? [];
        $user = $data['user'] ?? null;

        if (! $user || $user['id'] == auth()->id()) {
            return; // Don't add ourselves
        }

        // Check if user is already in the list
        if (! in_array($user['id'], $this->onlineUserIds)) {
            $foundUser = User::find($user['id']);
            if ($foundUser) {
                $this->onlineUsers->push($foundUser);
                $this->onlineUserIds[] = $user['id'];

                // Re-sort by name
                $this->onlineUsers = $this->onlineUsers->sortBy('name')->values();
            }
        }
    }

    /**
     * Listen for presence-leaving event from JavaScript
     */
    #[On('presence-leaving')]
    public function handlePresenceLeaving(...$params): void
    {
        $data = $params[0] ?? [];
        $user = $data['user'] ?? null;

        if (! $user) {
            return;
        }

        // Remove user from the list
        $this->onlineUsers = $this->onlineUsers->reject(function ($u) use ($user) {
            return $u->id == $user['id'];
        })->values();

        $this->onlineUserIds = array_values(
            array_diff($this->onlineUserIds, [$user['id']])
        );
    }

    /**
     * Manual refresh via polling (fallback)
     */
    public function refreshOnlineUsers(): void
    {
        $this->loadOnlineUsers();
    }

    public function sendChatRequest(int $userId): void
    {
        \Log::info('🚀 OnlineUsers sendChatRequest called', [
            'userId' => $userId,
            'current_user' => auth()->id(),
        ]);

        $this->dispatch('send-chat-request', userId: $userId)->to('chat.chat-requests');

        \Log::info('✅ Dispatched send-chat-request event to ChatRequests component');
    }

    public function render(): View
    {
        return view('livewire.chat.online-users');
    }
}
