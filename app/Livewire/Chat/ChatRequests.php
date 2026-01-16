<?php

namespace App\Livewire\Chat;

use App\Events\ChatRequestAccepted;
use App\Events\ChatRequestSent;
use App\Models\ChatRequest;
use App\Models\ChatSession;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatRequests extends Component
{
    use LivewireAlert;

    public Collection $pendingRequests;

    public Collection $sentRequests;

    public function mount(): void
    {
        $this->loadPendingRequests();
    }

    public function loadPendingRequests(): void
    {
        $this->pendingRequests = ChatRequest::where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->with('sender')
            ->latest()
            ->get();
        $this->sentRequests = ChatRequest::where('sender_id', auth()->id())
            ->where('status', 'pending')
            ->with('receiver')
            ->latest()
            ->get();
    }

    /**
     * Listen for new chat requests - triggered by JavaScript
     */
    #[On('chat-request-received')]
    public function handleNewRequest(): void
    {
        // Reload pending requests
        $this->loadPendingRequests();
    }

    #[On('send-chat-request')]
    public function sendRequest(int $userId): void
    {
        // Check if request already exists
        $existing = ChatRequest::where('sender_id', auth()->id())
            ->where('receiver_id', $userId)
            ->where('status', 'pending')
            ->first();

        if ($existing) {
            $this->alert('info', 'You already have a pending request to this user.');

            return;
        }

        // Check if reverse request exists
        $reverse = ChatRequest::where('sender_id', $userId)
            ->where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->first();

        if ($reverse) {
            // Auto-accept and create session
            $this->acceptRequest($reverse->id);

            return;
        }

        // Check if active session already exists
        $existingSession = ChatSession::where(function ($query) use ($userId) {
            $query->where('user1_id', auth()->id())->where('user2_id', $userId);
        })->orWhere(function ($query) use ($userId) {
            $query->where('user1_id', $userId)->where('user2_id', auth()->id());
        })->first();

        if ($existingSession) {
            $this->alert('info', 'You already have an active chat with this user.');
            $this->dispatch('open-chat', $existingSession->id)->to('chat.chat-dashboard');

            return;
        }

        // Create new request
        $request = ChatRequest::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $userId,
            'status' => 'pending',
        ]);

        \Log::info('📤 Broadcasting ChatRequestSent', [
            'request_id' => $request->id,
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'channel' => 'private-user.'.$userId,
        ]);

        // Broadcast via Reverb to the receiver
        broadcast(new ChatRequestSent($request))->toOthers();

        \Log::info('✅ Broadcast dispatched');

        $this->alert('success', 'Chat request sent!');

        // Reload to show in sent requests
        $this->loadPendingRequests();
    }

    public function acceptRequest(int $requestId): void
    {
        $request = ChatRequest::findOrFail($requestId);

        // Verify this user is the receiver
        if ($request->receiver_id !== auth()->id()) {
            $this->alert('error', 'Unauthorized action.');

            return;
        }

        $request->accept();

        // Create chat session
        $session = ChatSession::create([
            'user1_id' => $request->sender_id,
            'user2_id' => $request->receiver_id,
        ]);

        // Broadcast acceptance via Reverb to the sender
        broadcast(new ChatRequestAccepted($request, $session))->toOthers();

        // Remove from local list
        $this->pendingRequests = $this->pendingRequests->reject(function ($req) use ($requestId) {
            return $req->id === $requestId;
        });

        $this->alert('success', 'Chat request accepted!');

        // Open the chat window - FIXED: removed named parameter
        $this->dispatch('open-chat', $session->id)->to('chat.chat-dashboard');
    }

    public function rejectRequest(int $requestId): void
    {
        $request = ChatRequest::findOrFail($requestId);

        // Verify this user is the receiver
        if ($request->receiver_id !== auth()->id()) {
            $this->alert('error', 'Unauthorized action.');

            return;
        }

        $request->reject();

        // Remove from local list
        $this->pendingRequests = $this->pendingRequests->reject(function ($req) use ($requestId) {
            return $req->id === $requestId;
        });

        $this->alert('success', 'Chat request rejected.');
    }

    public function cancelRequest(int $requestId): void
    {
        $request = ChatRequest::findOrFail($requestId);

        // Verify this user is the sender
        if ($request->sender_id !== auth()->id()) {
            $this->alert('error', 'Unauthorized action.');

            return;
        }

        \Log::info('🚫 Broadcasting ChatRequestCancelled', [
            'request_id' => $request->id,
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
        ]);

        // Broadcast cancellation to receiver
        broadcast(new \App\Events\ChatRequestCancelled($request))->toOthers();

        // Delete the request
        $request->delete();

        // Remove from local list
        $this->sentRequests = $this->sentRequests->reject(function ($req) use ($requestId) {
            return $req->id === $requestId;
        });

        $this->alert('success', 'Chat request cancelled.');
    }

    public function render(): View
    {
        return view('livewire.chat.chat-requests');
    }
}