<?php

namespace App\Http\Controllers;

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
    public function settings(){

        $organiser = auth()->user();
        $streamSettings = StreamSettings::whereOrganisorId($organiser->id)->first();

        return view('ManageOrganiser.stream-settings', compact('organiser', 'streamSettings'));
    }


    /**
     * @param Request $request
     * set stream settings
     * incoming post request
     * @return redirect
     */
    public function postSettings(Request $request){
        StreamSettings::updateOrCreate([
            'organisor_id' => $request->input('organisor_id'),
            'publishing_point_type' => $request->input('publishing_point_type'),
            'publishing_point_primary' => $request->input('publishing_point_primary'),
            'publishing_point_backup' => $request->input('publishing_point_backup'),
            'stream_name' => $request->input('stream_name'),
            'login' => $request->input('login'),
            'password' => $request->input('password'),
            'live_transcoding' => $request->input('live_transcoding'),
            'region' => $request->input('region'),
        ]);

        return redirect()->back();
    }

}
