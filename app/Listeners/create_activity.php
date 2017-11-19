<?php

namespace App\Listeners;

use App\Events\create_activity_report;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Activity;

class create_activity
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    public function handle(create_activity_report $event)
    {
        //save activity to DB 
       Activity::create([
                'activity_title' => $event->activity,
                'location' => $event->location,
                'date' => $event->date ,
                'description' => $event->description ,
                'dpemployees_id' => $event->id
            ]);
    }

}
