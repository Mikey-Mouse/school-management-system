<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class depedStaffEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;
    public $password;

    public function __construct($username,$password)
    {
        $this->username =  $username;
        $this->password =  $password;    
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
