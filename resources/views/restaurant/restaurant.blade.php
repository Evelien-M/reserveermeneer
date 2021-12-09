@extends('partials.layout')

@section('title','Restaurants')
    
@section('content')
<div class="jumbotron">
    <h1 class="display-4 text-center">Restaurants</h1>
</div>
 
<div class="event-content">
    <div class="container">
        <div class="row">
            @foreach ($restaurants as $restaurant)
                <div class="col-3">
                    <div class="card" style="width: 16rem;">
                        <div class="card-body">
                        <h5 class="card-title">{{$restaurant->name}}</h5>
                        <p class="card-text">{{$restaurant->open_time}} - {{$restaurant->close_time}}</p>
                        <p class="card-text">Keuken type: {{$restaurant->kitchen_type}}</p>
                        <a href="/restaurant/{{$restaurant->id}}" class="btn btn-primary">{{__('messages.buttonview')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection