@extends('partials.layout')

@section('title','Restaurants')
    
@section('content')
<div class="jumbotron">
    <h1 class="display-4 text-center">Restaurants</h1>
</div>
 
<div class="container filter">
    <form method="GET" action="/restaurant">
        <div class="row">
            <div class="col-md-6">
                <h3>Filter:</h3>
                <div class="form-group">
                    <label for="exampleFormControlInput1">{{__('messages.location')}}</label>
                    <input type="text" value="{{$filter_location}}" name="location" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">{{__('messages.kitchentype')}}</label>
                    <select class="form-control" name="kitchentype">
                        <option value="all">{{__('messages.all')}}</option>
                        @foreach ($options as $item)
                            @if ($item->type == $filter_kitchentype)
                                <option value="{{$item->type}}" selected>{{$item->type}}</option>                             
                            @else
                                <option value="{{$item->type}}">{{$item->type}}</option>
                            @endif
                            
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Filter"/>
            </div>
            <div class="col-md-6">
                <h3>{{__('messages.sort')}}:</h3>
                <select class="form-control" name="order">
                    <option value="name-DESC">Naam aflopend</option>
                    <option value="name-ASC">Naam oplopend</option>
                    <option value="location-DESC">Locatie aflopend</option>
                    <option value="location-ASC">Locatie oplopend</option>
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
            @foreach ($restaurants as $restaurant)
                <div class="col-3">
                    <div class="card" style="width: 16rem; margin-bottom: 30px">
                        <div class="card-body">
                        <h5 class="card-title">{{$restaurant->name}}</h5>
                        <h6 class="card-text">{{$restaurant->location}}</h6>
                        <p class="card-text">{{$restaurant->open_time}} - {{$restaurant->close_time}}</p>
                        <p class="card-text">{{__('messages.kitchentype')}}: {{$restaurant->kitchen_type}}</p>
                        <a href="/restaurant/{{$restaurant->id}}" class="btn btn-primary">{{__('messages.buttonview')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection