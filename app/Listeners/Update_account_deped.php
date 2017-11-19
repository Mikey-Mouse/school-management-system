<?php

namespace App\Listeners;

use App\Events\account_deped;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class Update_account_deped
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
     * @param  account_deped  $event
     * @return void
     */
    public function handle(account_deped $event)
    {
        echo $event->username;
    }
}
