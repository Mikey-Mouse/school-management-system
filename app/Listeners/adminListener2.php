<?php

namespace App\Listeners;

use App\Events\adminEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use View;
use Share;

class adminListener2
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  adminEvent  $event
     * @return void
     */
    public function handle(adminEvent $event)
    {
        View::Share('name',$event->name);
    }
}
