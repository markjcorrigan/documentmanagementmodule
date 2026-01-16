<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatEnded implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chatSessionId;

    public $userId;

    public function __construct($chatSessionId, $userId)
    {
        $this->chatSessionId = $chatSessionId;
        $this->userId = $userId;
    }

    public function broadcastOn()
    {
        return new Channel('chat-session.'.$this->chatSessionId);
    }

    public function broadcastAs()
    {
        return 'ChatEnded';
    }

    public function broadcastWith()
    {
        return [
            'chat_session_id' => $this->chatSessionId,
            'user_id' => $this->userId,
            'message' => 'Chat session has been ended by the user.',
            'timestamp' => now()->toDateTimeString(),
        ];
    }
}
