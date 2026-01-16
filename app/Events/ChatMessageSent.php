<?php

namespace App\Events;

use App\Models\ChatMessage;
// use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public ChatMessage $message)
    {
        \Log::info('📡 ChatMessageSent event constructed', [
            'message_id' => $message->id,
            'session_id' => $message->chat_session_id,
            'channel' => 'chat-session.'.$message->chat_session_id,
        ]);

        // Eager load the sender relationship
        $this->message->load('sender');
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('chat-session.'.$this->message->chat_session_id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'ChatMessageSent';
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->message->id,
            'chat_session_id' => $this->message->chat_session_id,
            'sender_id' => $this->message->sender_id,
            'sender_name' => $this->message->sender->name,
            'message' => $this->message->message,
            'created_at' => $this->message->created_at->toISOString(),
        ];
    }
}
