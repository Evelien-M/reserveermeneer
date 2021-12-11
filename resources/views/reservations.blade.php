@extends('partials.layout')

@section('title','Dashboard')
    
@section('content')
<div class="container">
    <div class="section-event">
        <h2>Evenementen</h2>
        <table style="width: 100%">
            <thead>
              <tr>
                <th>{{__('messages.name')}}</th>
                <th>{{__('messages.location')}}</th>
                <th>{{__('messages.start')}}</th>
                <th>{{__('messages.end')}}</th>
                <th>{{__('messages.price')}}</th>
                <th>{{__('messages.days')}}</th>
                <th>csv</th>
                <th>json</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($event as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->location}}</td>
                        <td>{{$item->event_start_date}}</td>
                        <td>{{$item->event_end_date}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->days}}</td>
                        <td><a href="reservations/csv/{{$item->id}}" class="btn btn-primary">CSV</a></td>
                        <td><a href="reservations/json/{{$item->id}}" class="btn btn-primary">JSON</a></td>
                    </tr>
                @endforeach
              
                
            </tbody>
            </table>
    </div>
    <hr>
    <div class="section-event">
        <h2>Bioscoop</h2>
        <table style="width: 100%">
            <thead>
              <tr>
                <th>Naam</th>
                <th>Start</th>
                <th>End</th>
                <th>Zaal</th>
                <th>Rij</th>
                <th>Stoel</th>
                <th>Prijs</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($movie as $item)
                    <tr>
                        <td>{{$item->movie_name}}</td>
                        <td>{{$item->start_date}}</td>
                        <td>{{$item->end_date}}</td>
                        <td>{{$item->hall_name}}</td>
                        <td>{{$item->y}}</td>
                        <td>{{$item->x}}</td>
                        <td>{{$item->movie_price}}</td>
                    </tr>
                @endforeach                
            </tbody>
        </table>
    </div>
    <hr>
    <div class="section-event">
        <h2>Restaurant</h2>
        <table style="width: 100%">
            <thead>
              <tr>
                <th>Naam</th>
                <th>Locatie</th>
                <th>Dag</th>
                <th>Tijd</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($restaurant as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->location}}</td>
                        <td>{{$item->day}}</td>
                        <td>{{$item->time}}</td>
                    </tr>
                @endforeach                
            </tbody>
        </table>
    </div>
</div>
@endsection