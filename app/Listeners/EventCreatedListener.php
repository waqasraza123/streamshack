<?php

namespace App\Listeners;

use App\Events\EventCreatedEvent;
use App\Events\OrderCompletedEvent;
use App\Jobs\CreateChannelStream;
use App\Jobs\CreateChannelStreamJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class EventCreatedListener implements ShouldQueue
{

    use DispatchesJobs;
    public $event;

    /**
     * Create the event listener.
     *
     * @param EventCreatedEvent $eventCreated
     * @return void
     *
     */
    public function __construct()
    {
    }

    /**
     * Generate the ticket and send it to the attendee. If the ticket can't be generated don't attempt to send the ticket
     * to the attendee as the ticket is attached as a PDF.
     *
     * @param  OrderCompletedEvent  $event
     * @return void
     */
    public function handle(EventCreatedEvent $eventCreated)
    {

        $this->event = $eventCreated;

        Log::info("Event Listener Fired");
        //dispatch the job to create the channel
        $this->dispatch(new CreateChannelStreamJob($this->event));

    }
}
