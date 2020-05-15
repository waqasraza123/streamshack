@extends('Shared.Layouts.Master')

@section('title')
    Stream Page
@stop

@section('top_nav')
    @include('ManageEvent.Partials.TopNav')
@stop

@section('page_title')


{{--    <div class="row">--}}
{{--        <div class="col-8">--}}
{{--            <form method="post" action="{{route('fetch-stream', ['id' => $event->id])}}">--}}
{{--                <input type="text" name="channel_id" class="form-control">--}}
{{--                <input type="submit" value="Submit" class="btn btn-primary">--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}

<div class="row">
    <div class="col-md-6">
        <h1>Stream</h1>
    </div>
</div>
@stop

@section('head')

@stop

@section('menu')
    @include('ManageEvent.Partials.Sidebar')
@stop

@section('content')
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <script id="{{$streamId}}" width="512" height="288" src="//player.dacast.com/js/player.js"  class="dacast-video"></script>
        </div>
    </div>
@stop
