@extends('partials.layout')

@section('title','Events')
    
@section('content')
<div class="jumbotron">
    @if ($showEdit)
        <a class="btn btn-secondary" href="/eventcrud">Edit</a>
    @endif
    <h1 class="display-4 text-center">{{__('messages.events')}}</h1>
</div>
 
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
                        <a href="/event/{{$event->id}}" class="btn btn-primary">{{__('messages.buttonview')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

@endsection