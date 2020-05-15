<?php

namespace App\Providers;

use App\Events\EventCreatedEvent;
use App\Events\OrderCompletedEvent;
use App\Listeners\EventCreatedListener;
use App\Listeners\OrderCompletedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        OrderCompletedEvent::class => [
            OrderCompletedListener::class,
        ],
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        EventCreatedEvent::class => [
            EventCreatedListener::class,
        ]
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
