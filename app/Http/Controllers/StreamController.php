<?php

namespace App\Http\Controllers;

use App\Stream;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    public function customerStreamPage($id){
        $stream = Stream::whereEventId($id)->first();


        return view('Shared.customer-event-stream', compact('stream'));
    }
}
