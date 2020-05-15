@extends('Shared.Layouts.General.GeneralMaster')

@section('title')
    Stream Page
@stop

@section('top_nav')
    @include('Shared.Layouts.General.General-TopNav')
@stop

@section('page_title')
    Add Stream Player
@stop

@section('head')

@stop

@section('menu')
    @include('ManageOrganiser.Partials.Sidebar')
@stop

@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">publishing_point_type</label>
                <input type="text" name="publishing_point_type" value="{{$streamSettings ? $streamSettings->publishing_point_type : ""}}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">publishing_point_primary</label>
                <input type="text" name="publishing_point_primary" value="{{$streamSettings ? $streamSettings->publishing_point_primary : ""}}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">publishing_point_backup</label>
                <input type="text" name="publishing_point_backup" value="{{$streamSettings ? $streamSettings->publishing_point_backup : ""}}" class="form-control">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">stream_name</label>
                <input type="text" name="stream_name" value="{{$streamSettings ? $streamSettings->stream_name : ""}}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">login</label>
                <input type="text" name="login" value="{{$streamSettings ? $streamSettings->login : ""}}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">password</label>
                <input type="text" name="password" value="{{$streamSettings ? $streamSettings->password : ""}}" class="form-control">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">live_transcoding</label>
                <input type="text" name="live_transcoding" value="{{$streamSettings ? $streamSettings->live_transcoding : ""}}" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label">region</label>
                <input type="text" name="region" value="{{$streamSettings ? $streamSettings->region : ""}}" class="form-control">
            </div>
        </div>
    </div>
    <input type="hidden" name="organisor_id" value="{{auth()->id()}}">

@stop
