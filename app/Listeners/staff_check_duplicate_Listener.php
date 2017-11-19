<?php

namespace App\Listeners;

use App\Events\depedStaffEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class staff_check_duplicate_Listener
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
     * @param  depedStaffEvent  $event
     * @return void
     */
    public function handle(depedStaffEvent $event)
    {
        echo $event->username . "<br>";
        echo $event->password;
    }
}
