<?php

namespace App\Events;

use App\Models\ChatRequest;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatRequestSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public ChatRequest $chatRequest;

    public function __construct(ChatRequest $chatRequest)
    {
        $this->chatRequest = $chatRequest->load('sender');
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('user.'.$this->chatRequest->receiver_id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'chat.request.sent';
    }

    public function broadcastWith(): array
    {
        return [
            'request' => [
                'id' => $this->chatRequest->id,
                'sender_id' => $this->chatRequest->sender_id,
                'receiver_id' => $this->chatRequest->receiver_id,
                'status' => $this->chatRequest->status,
                'sender' => [
                    'id' => $this->chatRequest->sender->id,
                    'name' => $this->chatRequest->sender->name,
                    'email' => $this->chatRequest->sender->email,
                ],
            ],
        ];
    }
}
