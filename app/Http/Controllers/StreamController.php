<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Stream;
use App\StreamSettings;
use Illuminate\Http\Request;

class StreamController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function customerStreamPage($id){
        $stream = Stream::whereEventId($id)->first();


        return view('Shared.customer-event-stream', compact('stream'));
    }

    /**
     * show stream settings page
     * incoming get request
     */
    public function settings($id){

        $streamSettings = StreamSettings::whereEventId($id)->first();
        $event = Event::whereId($id)->first();
        $organiser = $event->organiser;

        return view('ManageOrganiser.stream-settings', compact('streamSettings', 'organiser'));
    }


    /**
     * @param Request $request
     * set stream settings
     * incoming post request
     * @return redirect
     */
    public function postSettings($data, $eventId){
        StreamSettings::updateOrCreate([
            'event_id' => $eventId,
            'publishing_point_type' => $data['publishing_point_type'],
            'publishing_point_primary' => $data['publishing_point_primary'],
            'publishing_point_backup' => $data['publishing_point_backup'],
            'stream_name' => $data['stream_name'],
            'login' => $data['login'],
            'password' => $data['password'],
            'live_transcoding' => $data['live_transcoding'],
        ]);

        return redirect()->back();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function createStreamPage($id){

        $event = Event::whereId($id)->first();
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.dacast.com/v2/channel/542788/embed/javascript?apikey=166768_b891e6ba6923a88fd7ff&_format=JSON');

        $embedCode = $response->getBody();
        $streamId = (explode("\u0022", $embedCode));

        $streamId = $streamId[1];

        return view('Shared.event-stream-page')->withEventId($id)->withEvent($event)->withStreamId($streamId);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function fetchLiveStream(Request $request){

        $channelId = $request->input('channel_id');

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.dacast.com/v2/channel/'.$channelId.'/embed/javascript?apikey=166768_bbb1139e84c4f4f1bd96&_format=JSON');

        //echo $response->getStatusCode(); // 200
        //echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        $embedCode = $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
        dd("here");
        return redirect()->back()->with('embedCode', $embedCode);

    }

}
