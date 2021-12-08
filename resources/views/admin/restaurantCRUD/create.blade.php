@extends('partials.layout')

@section('title','Events Management')
    
@section('content')
<div class="container">
    <form method="POST" action="/restaurantcrud/" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name1">Name</label>
            <input type="text" class="form-control" name="name" id="name1" required>
        </div>
        <div class="form-group">
            <label for="open_time">Open tijd</label>
            <input type="time" class="form-control" name="open_time" id="open_time" required>
        </div>
        <div class="form-group">
            <label for="close_time">Dicht tijd</label>
            <input type="time" class="form-control" name="close_time" id="close_time" required>
        </div>
        <div class="form-group">
            <label for="seatamount">Aantal zitplaatsen</label>
            <input name="amount_seats" type="number" class="form-control" id="seatamount" required>
        </div>
        <div class="form-group">
            <select class="form-control" name="kitchen_type">
                @foreach ($options as $item)
                    <option value="{{$item->type}}">{{$item->type}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection