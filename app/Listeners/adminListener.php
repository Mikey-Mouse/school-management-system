<?php

namespace App\Listeners;

use App\Events\adminEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use View;
use Share;
class adminListener
{

    public function __construct()
    {
    }

    public function handle(adminEvent $event)
    {
        //View::Share('user',$event->user);
        foreach ($event->user as $key ) {
            echo $key . "<br>";
        }
    }
}
