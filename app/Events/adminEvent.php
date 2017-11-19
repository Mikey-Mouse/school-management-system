<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class adminEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $name;
    public function __construct($user,$name)
    {
        $this->user = $user;
        $this->name = $name;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
