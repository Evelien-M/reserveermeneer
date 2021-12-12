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
                <h3>{{__('messages.sort')}}:</h3>
                <select class="form-control" name="order">
                    <option value="name-DESC" {{$sort_order == "name-DESC" ? 'selected' : ''}}>{{__('messages.namedesc')}}</option>
                    <option value="name-ASC" {{$sort_order == "name-ASC" ? 'selected' : ''}}>{{__('messages.nameasc')}}</option>
                    <option value="event_start_date-DESC" {{$sort_order == "event_start_date-DESC" ? 'selected' : ''}}>{{__('messages.datedesc')}}</option>
                    <option value="event_start_date-ASC" {{$sort_order == "event_start_date-ASC" ? 'selected' : ''}}>{{__('messages.dateasc')}}</option>
                    <option value="location-DESC" {{$sort_order == "location-DESC" ? 'selected' : ''}}>{{__('messages.locationdesc')}}</option>
                    <option value="location-ASC" {{$sort_order == "location-ASC" ? 'selected' : ''}}>{{__('messages.locationasc')}}</option>
                </select>
                <input type="submit" style="margin-top: 15px" class="btn btn-primary" value="{{__('messages.sort')}}"/>
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