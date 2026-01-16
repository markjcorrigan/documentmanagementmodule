<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageRead implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public int $messageId,
        public int $sessionId
    ) {}

    public function broadcastOn(): array
    {
        return [
            new Channel('chat-session.'.$this->sessionId),
        ];
    }

    public function broadcastAs(): string
    {
        return 'MessageRead'; // Make sure this matches JavaScript
    }

    public function broadcastWith(): array
    {
        return [
            'message_id' => $this->messageId,
            'session_id' => $this->sessionId,
        ];
    }
}
