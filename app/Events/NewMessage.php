<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\message;

class NewMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    // public $username;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(message $message)
    {
        $this->message = $message;

        // $this->username = $username;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('messages'.$this->message->to);

    }

    public function bradacastWith()
    {
        return[ "message" => $this->message];
    }

    // public function broadcastAs(){
    //     return 'NewMessage';
    // }
}
