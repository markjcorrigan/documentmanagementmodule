<?php

namespace App\Livewire\Chat;

use App\Events\VisitorConnected;
use App\Models\ChatSession;
use App\Models\OnlineUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatDashboard extends Component
{
    public $activeView = 'online-users'; // online-users, chat-window

    public $selectedSessionId = null;

    public function mount()
    {
        // Only proceed if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Update current user's online status
        OnlineUser::updatePresence(Auth::id());

        // ✅ TRACK VISITOR - Fire once when they visit the chat page
        try {
            VisitorConnected::dispatch(
                Auth::id(),
                Auth::user()->name,
                request()->ip(),
                request()->userAgent(),
                request()->url()
            );

            \Log::info('📊 Visitor tracked on chat page', [
                'user_id' => Auth::id(),
                'username' => Auth::user()->name,
                'ip' => request()->ip(),
            ]);
        } catch (\Exception $e) {
            // Don't break the page if visitor tracking fails
            \Log::error('❌ Visitor tracking failed', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id()
            ]);
        }

        // Check if we need to open a specific chat session from URL parameter
        if (request()->has('session')) {
            $sessionId = request()->get('session');
            $this->openChat($sessionId);
        }
    }

    #[On('open-chat')]
    public function openChat($sessionId)
    {
        $session = ChatSession::find($sessionId);

        if ($session && $session->hasUser(Auth::id())) {
            $this->selectedSessionId = $sessionId;
            $this->activeView = 'chat-window';

            \Log::info('💬 Opening chat window', [
                'user_id' => Auth::id(),
                'session_id' => $sessionId
            ]);
        } else {
            session()->flash('error', 'Unable to open chat session.');

            \Log::warning('❌ Failed to open chat', [
                'user_id' => Auth::id(),
                'session_id' => $sessionId,
                'reason' => $session ? 'User not in session' : 'Session not found'
            ]);
        }
    }

    #[On('chat-closed')]
    public function closeChat()
    {
        \Log::info('🚪 Closing chat window', [
            'user_id' => Auth::id(),
            'session_id' => $this->selectedSessionId
        ]);

        $this->activeView = 'online-users';
        $this->selectedSessionId = null;
    }

    #[On('chat-ended')]
    public function returnToOnlineUsers()
    {
        \Log::info('🔚 Chat ended, returning to user list', [
            'user_id' => Auth::id(),
            'session_id' => $this->selectedSessionId
        ]);

        $this->activeView = 'online-users';
        $this->selectedSessionId = null;
    }

    public function render()
    {
        return view('livewire.chat.chat-dashboard')
            ->layout('components.layouts.app.frontend');
    }
}