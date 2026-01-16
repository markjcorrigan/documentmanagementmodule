<?php

namespace App\Events;

use App\Models\ChatRequest;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatRequestCancelled implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $requestId;

    public int $senderId;

    public int $receiverId;

    public function __construct(ChatRequest $request)
    {
        $this->requestId = $request->id;
        $this->senderId = $request->sender_id;
        $this->receiverId = $request->receiver_id;
    }

    public function broadcastOn(): Channel
    {
        return new PrivateChannel('user.'.$this->receiverId);
    }

    public function broadcastAs(): string
    {
        return 'chat.request.cancelled';
    }

    public function broadcastWith(): array
    {
        return [
            'request_id' => $this->requestId,
            'sender_id' => $this->senderId,
        ];
    }
}
