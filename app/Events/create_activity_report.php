<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class create_activity_report
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $id;
    public $activity;
    public $location;
    public $date;
    public $description;

    public function __construct($id,$activity,$location,$date,$description)
    {
        $this->id = $id;
        $this->activity = $activity;
        $this->location = $location;
        $this->date = $date;
        $this->description = $description;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
