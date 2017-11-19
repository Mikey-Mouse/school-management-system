<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\adminEvent' => [
            'App\Listeners\adminListener',
            'App\Listeners\adminListener2',
        ],
        'App\Events\depedStaffEvent' => [
            'App\Listeners\staff_check_duplicate_Listener',
            'App\Listeners\staff_update_Listener',
        ],
        'App\Events\create_activity_report' => [
            'App\Listeners\create_activity',
        ],
        'App\Events\account_deped' => [
            'App\Listeners\Update_account_deped',
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
