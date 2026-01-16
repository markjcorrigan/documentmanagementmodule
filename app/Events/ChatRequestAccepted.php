<?php

namespace App\Events;

use App\Models\ChatRequest;
use App\Models\ChatSession;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatRequestAccepted implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public ChatRequest $request,
        public ChatSession $session
    ) {
        $this->request->load('sender', 'receiver');
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('user.'.$this->request->sender_id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'chat.request.accepted';
    }

    public function broadcastWith(): array
    {
        return [
            'request' => [
                'id' => $this->request->id,
                'sender_id' => $this->request->sender_id,
                'receiver_id' => $this->request->receiver_id,
                'receiver' => [
                    'id' => $this->request->receiver->id,
                    'name' => $this->request->receiver->name,
                    'email' => $this->request->receiver->email,
                ],
            ],
            'session' => [
                'id' => $this->session->id,
                'user1_id' => $this->session->user1_id,
                'user2_id' => $this->session->user2_id,
            ],
        ];
    }
}
