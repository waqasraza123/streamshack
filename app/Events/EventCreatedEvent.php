<?php

namespace App\Events;

use App\Models\Event;
use Illuminate\Queue\SerializesModels;

class EventCreatedEvent
{
    use SerializesModels;

    public $event;

    /**
     * OrderCompletedEvent constructor.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }
}
