<?php

namespace App\Jobs;

use App\Events\EventCreatedEvent;
use App\Http\Controllers\StreamController;
use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class CreateChannelStreamJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $event;
    /**
     * Create a new job instance.
     * @param $event
     * @return void
     */
    public function __construct(EventCreatedEvent $event)
    {
        $this->event = $event->event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('creating channel');

        $event = $this->event;
        $apiKey = Config::get('dacast.api_key');
        $baseUrl = Config::get('dacast.base_url');

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $baseUrl.'channel?'.'apikey='.$apiKey,
            [
                'form_params' => [
                    'title' => $event->title
                ]
            ]);
        $data = json_decode($response->getBody(), true);

        (new StreamController())->postSettings($data, $event->id);

    }
}
