@extends('partials.layout')

@section('title','Restuarant')
    
@section('content')
<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col-md-8">
            <h1>{{$restaurant->name}}</h1>
            <h2>{{$restaurant->location}}</h2>
            <p>Open: {{$restaurant->open_time}}</p>
            <p>{{__('messages.closed')}}: {{$restaurant->close_time}}</p>
            @if(App::getLocale() == "en")
                <p>Kitchen type: {{$restaurant->kitchen_type2}}</p>                 
            @else
            <p>Keuken type: {{$restaurant->kitchen_type}}</p> 
            @endif
         
        </div>
        <div class="col-md-4">
            <h2>{{__('messages.reservation')}}</h2>
            <form method="POST" action="/restaurant/{{$restaurant->id}}">
                @csrf
                <div class="form-group">
                    <label>{{__('messages.date')}}</label>
                    <input type="date" name="day" class="form-control" value={{$day}} required>
                    <input type="submit" style="margin-top: 15px;" value="{{__('messages.choose')}}" class="btn btn-primary">
                </div>
            </form>
            @if($availableTime != null)
                <form method="POST" action="/restaurantItem/" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
                    <input type="hidden" name="day" value="{{$day}}">
                    <div class="form-group">
                        <p>{{__('messages.time')}}</p>
                        @foreach ($availableTime as $time)
                            <input style="margin-left: 0px; margin-top: 7px" class="form-check-input" type="radio" name="time" id="exampleRadios1-{{$time}}" value="{{$time}}" checked>
                            <label style="margin-left: 15px" class="form-check-label" for="exampleRadios1-{{$time}}">
                            {{$time}}
                            </label>
                            <br>
                        @endforeach
                    </div>
                    
    
                    <div class="form-group">
                        <label for="inputa">{{__('messages.zipcode')}}</label>
                        <input type="text" class="form-control" name="zipcode" id="inputa" required>
                    </div>
                    <div class="form-group">
                        <label for="inputb">{{__('messages.address')}}</label>
                        <input type="text" class="form-control" name="address" id="inputb" required>
                    </div>
                    <div class="form-group">
                        <label for="inputc">{{__('messages.city')}}</label>
                        <input type="text" class="form-control" name="city" id="inputc" required>
                    </div>
                    <div class="form-group">
                        <label for="inputd">{{__('messages.housenumber')}}</label>
                        <input type="text" class="form-control" name="house_number" id="inputd" required>
                    </div>
                    <div class="form-group">
                        <label for="inpute">{{__('messages.country')}}</label>
                        <input type="text" class="form-control" name="country" id="inpute" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAmount">{{__('messages.amount')}}</label>
                        <input type="number" class="form-control" name="amount" id="inputAmount" value="1" required min="1" max="10">
                    </div>
                    <div class="form-inline">
                        <button type="submit" class="btn btn-primary">{{__('messages.book')}}</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection