<?php

namespace App\Livewire\Chat;

use App\Events\ChatEnded;
use App\Events\ChatMessageSent;
use App\Events\MessageRead;
use App\Models\ChatMessage;
use App\Models\ChatSession;
use Illuminate\View\View;
use Livewire\Component;

class ChatWindow extends Component
{
    public ?ChatSession $session = null;

    public $chatMessages = [];

    public $message = '';

    public $otherUser = null;

    protected $listeners = [
        'scroll-to-bottom' => 'scrollToBottom',
        'message-received' => 'handleNewMessage',
    ];

    public function mount(?int $sessionId = null): void
    {
        if ($sessionId) {
            $this->loadSession($sessionId);
        }
    }

    public function loadSession(int $sessionId): void
    {
        $this->session = ChatSession::with(['user1', 'user2'])->findOrFail($sessionId);

        // Determine the other user
        $this->otherUser = $this->session->user1_id === auth()->id()
            ? $this->session->user2
            : $this->session->user1;

        $this->loadMessages();
        $this->markMessagesAsRead();
    }

    public function loadMessages(): void
    {
        if (! $this->session) {
            return;
        }

        // Always reload fresh from database to avoid duplication
        $this->chatMessages = $this->session->messages()
            ->with('sender')
            ->orderBy('created_at', 'asc') // Always order by ascending for display
            ->get();
    }

    public function sendMessage()
    {
        \Log::info('[START] sendMessage() START');

        try {
            \Log::info('[START] sendMessage() called', [
                'session_id' => $this->session?->id,
                'message' => $this->message,
            ]);

            $this->validate([
                'message' => 'required|string|max:1000',
            ]);

            \Log::info('[CHECK] Validation passed, creating message');

            $sessionId = $this->session->id;
            $senderId = auth()->id();
            $messageText = $this->message;

            // Create the message
            $message = ChatMessage::create([
                'chat_session_id' => $sessionId,
                'sender_id' => $senderId,
                'message' => $messageText,
            ]);

            \Log::info('💾 Message created in DB', ['message_id' => $message->id]);

            // Load the message with sender relationship
            $message->load('sender');

            // IMPORTANT: Add the message to the local collection FIRST
            // This prevents the duplicate when the broadcast comes back
            $this->chatMessages->push($message);

            // Clear the input immediately
            $this->message = '';

            // Broadcast the message to others
            \Log::info('🔥 BROADCASTING ChatMessageSent EVENT', ['message_id' => $message->id]);
            broadcast(new ChatMessageSent($message))->toOthers();

            \Log::info('🎉 BROADCAST DISPATCHED');

            // Dispatch event for scrolling (but don't reload messages)
            $this->dispatch('scroll-to-bottom');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('❌ Validation failed', ['errors' => $e->errors()]);
            throw $e;
        } catch (\Exception $e) {
            \Log::error('❌ Exception in sendMessage', [
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            throw $e;
        }

        \Log::info('🏁 sendMessage() FINISHED');
    }

    public function markMessagesAsRead(): void
    {
        if (! $this->session) {
            return;
        }

        $unreadMessages = $this->session->messages()
            ->where('sender_id', '!=', auth()->id())
            ->where('is_read', false)
            ->get();

        foreach ($unreadMessages as $msg) {
            $msg->update(['is_read' => true]);

            // Broadcast read receipt to others
            broadcast(new MessageRead($msg->id, $this->session->id))->toOthers();
        }
    }

    /**
     * Handle new message from JavaScript (called via $wire.call)
     */
    public function handleNewMessage($event): void
    {
        \Log::info('📥 handleNewMessage called', ['event_id' => $event['id']]);

        // Check if message already exists in the collection to prevent duplicates
        $exists = $this->chatMessages->contains('id', $event['id']);

        if (!$exists) {
            // Try to find the message in database (it should be there from the broadcast)
            $message = ChatMessage::with('sender')->find($event['id']);

            if ($message) {
                // Add to collection
                $this->chatMessages->push($message);

                // If we received this message from someone else, mark it as read
                if ($message->sender_id !== auth()->id()) {
                    $message->update(['is_read' => true]);

                    // Broadcast read receipt (but only to others to avoid loops)
                    broadcast(new MessageRead($message->id, $this->session->id))->toOthers();
                }

                // Dispatch scroll event
                $this->dispatch('scroll-to-bottom');
            }
        }
    }

    /**
     * Handle message read from JavaScript (called via $wire.call)
     */
    public function handleMessageRead($event): void
    {
        // Update the message as read in the local collection
        $message = $this->chatMessages->firstWhere('id', $event['message_id']);

        if ($message && $message->sender_id === auth()->id()) {
            $message->is_read = true;
        }
    }

    /**
     * Handle chat ended from JavaScript (called via $wire.call)
     */
    public function handleChatEnded($event): void
    {
        // Check if this is our current session that was ended
        if ($this->session && $this->session->id === $event['chat_session_id']) {
            // Close the chat when the other user ends it
            $this->closeChat();

            // Show a message to the user
            session()->flash('error', 'The other user has ended the chat. All messages have been deleted.');
        }
    }

    public function endChat(): void
    {
        if (! $this->session) {
            return;
        }

        try {
            // Store the session ID before deletion for broadcasting
            $sessionId = $this->session->id;
            $userId = auth()->id();

            // Delete all messages in this chat session
            ChatMessage::where('chat_session_id', $this->session->id)->delete();

            // Delete the chat session itself
            $this->session->delete();

            // Broadcast that the chat has ended to all users
            broadcast(new ChatEnded($sessionId, $userId));

            // Clear any chat-related session data
            session()->forget('active_chat_session_id');
            session()->forget('current_chat_session_id');
            session()->forget('chat_ended');

            // Close the chat window
            $this->closeChat();

            // Show success message
            session()->flash('success', 'Chat ended successfully. All messages have been deleted.');

        } catch (\Exception $e) {
            // Log the error and show error message
            \Log::error('Error ending chat: '.$e->getMessage());
            session()->flash('error', 'Failed to end chat. Please try again.');
        }
    }

    public function closeChat(): void
    {
        $this->session = null;
        $this->chatMessages = collect([]);
        $this->otherUser = null;
        $this->message = '';

        $this->dispatch('chat-closed')->to('chat.chat-dashboard');
    }

    public function render(): View
    {
        return view('livewire.chat.chat-window');
    }

    /**
     * Helper method to trigger scroll from JavaScript
     */
    public function scrollToBottom(): void
    {
        // This method is called from JavaScript via Livewire dispatch
        // No need to implement anything here, it just provides a hook
    }
}