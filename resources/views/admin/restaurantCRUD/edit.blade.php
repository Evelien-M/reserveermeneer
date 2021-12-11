@extends('partials.layout')

@section('title','Events Management')
    
@section('content')
<div class="container">
    <form method="POST" action="/restaurantcrud/{{$restaurant->id}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name1">Name</label>
            <input type="text" class="form-control" name="name" id="name1" value="{{$restaurant->name}}" required>
        </div>
        <div class="form-group">
            <label for="open_time">Open tijd</label>
            <input type="time" class="form-control" name="open_time" id="open_time" value="{{$restaurant->open_time}}" required>
        </div>
        <div class="form-group">
            <label for="close_time">Dicht tijd</label>
            <input type="time" class="form-control" name="close_time" id="close_time" value="{{$restaurant->close_time}}" required>
        </div>
        <div class="form-group">
            <label for="seatamount">Aantal zitplaatsen</label>
            <input name="amount_seats" type="number" class="form-control" id="seatamount" value="{{$restaurant->amount_seats}}" required>
        </div>
        <div class="form-group">
            <label for="locations">Locatie</label>
            <input name="location" type="text" class="form-control" id="locations" value="{{$restaurant->location}}" required>
        </div>
        <div class="form-group">
            <label for="kitchentype">Keuken type</label>
            <select class="form-control" id="kitchentype" name="kitchen_type">
                @foreach ($options as $item)
                    @if ($restaurant->kitchen_type == $item->type)
                        <option selected value="{{$item->type}}">{{$item->type}}</option>   
                    @else
                        <option value="{{$item->type}}">{{$item->type}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection