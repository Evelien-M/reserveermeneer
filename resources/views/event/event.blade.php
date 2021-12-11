@extends('partials.layout')

@section('title','Events')
    
@section('content')
<div class="jumbotron">
    <h1 class="display-4 text-center">{{__('messages.events')}}</h1>
</div>

<div class="container filter">
    <form method="GET" action="/event">
        <div class="row">
            <div class="col-md-6">
                <h3>Filter:</h3>
                <div class="form-group">
                    <label for="exampleFormControlInput1">{{__('messages.location')}}</label>
                    <input type="text" value="{{$filter_location}}" name="location" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">{{__('messages.start')}}</label>
                    <input type="date" name="date_start" value="{{$filter_date_start}}" class="form-control" id="exampleFormControlInput2">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">{{__('messages.end')}}</label>
                    <input type="date" name="date_end" value="{{$filter_date_end}}" class="form-control" id="exampleFormControlInput2">
                </div>
                <input type="submit" class="btn btn-primary" value="Filter"/>
            </div>
            <div class="col-md-6">
                <h3>Sorteer:</h3>
                <select class="form-control" name="order">
                    <option value="name-DESC">Naam aflopend</option>
                    <option value="name-ASC">Naam oplopend</option>
                    <option value="event_start_date-DESC">Datum aflopend</option>
                    <option value="event_start_date-ASC">Datum oplopend</option>
                    <option value="name-DESC">Locatie aflopend</option>
                    <option value="name-ASC">Locatie oplopend</option>
                </select>
                <input type="submit" style="margin-top: 15px" class="btn btn-primary" value="Sorteer"/>
            </div>
        </div>
    </form>
</div>
<hr>
<div class="event-content">
    <div class="container">
     
        <div class="row">
            @foreach ($events as $event)
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <img class="card-img-top" src="{{asset('images/events/'. $event->image. '')}}" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">{{$event->name}}</h5>
                        <p class="card-text">{{__('messages.start')}}: {{$event->event_start_date}}</p>
                        <p class="card-text">{{__('messages.end')}}: {{$event->event_end_date}}</p>
                        <p class="card-text">{{__('messages.location')}}: {{$event->location}}</p>
                        <a href="/event/{{$event->id}}" class="btn btn-primary">{{__('messages.buttonview')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection