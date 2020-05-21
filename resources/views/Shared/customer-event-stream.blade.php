@extends('Shared.Layouts.BlankSlate')
@section('blankslate-body')
    <div class="row">
        <div class="col-md-12">
            <div class="content">
                @if(!$stream['success'])
                    <h4>{{$stream['data']}}</h4>
                @else
                    <script id="{{$stream['data']}}" width="512" height="288" src="//player.dacast.com/js/player.js"  class="dacast-video"></script>
                @endif
            </div>
        </div>
    </div>
@endsection