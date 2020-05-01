@extends('Shared.Layouts.CustomerMaster')

@section('title')
    {{auth()->user()->first_name}}
@endsection

@section('top_nav')
    @include('Customers.Partials.TopNav')
@stop
@section('page_title')
    My Events
@stop

@section('menu')
    @include('Customers.Partials.Sidebar')
@stop

@section('head')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" integrity="sha256-szHusaozbQctTn4FX+3l5E0A5zoxz7+ne4fr8NgWJlw=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js" integrity="sha256-Gk+dzc4kV2rqAZMkyy3gcfW6Xd66BhGYjVWa/FjPu+s=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js" integrity="sha256-0rg2VtfJo3VUij/UY9X0HJP7NET6tgAY98aMOfwP0P8=" crossorigin="anonymous"></script>

    {!! Html::script('https://maps.googleapis.com/maps/api/js?libraries=places&key='.config("attendize.google_maps_geocoding_key")) !!}
    {!! Html::script('vendor/geocomplete/jquery.geocomplete.min.js')!!}
    {!! Html::script('vendor/moment/moment.js')!!}
    {!! Html::script('vendor/fullcalendar/dist/fullcalendar.min.js')!!}
    <?php
    if(Lang::locale()!="en")
        echo Html::script('vendor/fullcalendar/dist/lang/'.Lang::locale().'.js');
    ?>
    {!! Html::style('vendor/fullcalendar/dist/fullcalendar.css')!!}
@stop

@section('content')

    <div class="row">

        <div class="col-md-8">
            <table class="table table-condensed">
                <thead>
                <th>Event Tittle</th>
                <th>Location</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Download Ticket</th>
                </thead>
                <tbody>
                @foreach($attendees as $customer)
                    <tr>
                        <td>{{$customer->event->title}}</td>
                        <td>{{$customer->event->location}}</td>
                        <td>{{$customer->event->description}}</td>
                        <td>{{$customer->event->start_date}}</td>
                        <td>{{$customer->event->end_date}}</td>
                        <td><a class="btn btn-primary" href="{{route('showOrderTickets', ['order_reference' => \App\Models\Attendee::whereOrderId($customer->order_id)->first()->order->order_reference]).'?download=1'}}">Download</a></td>
                    </tr>

                @endforeach
                </tbody>
            </table>


        </div>
    </div>
@stop
