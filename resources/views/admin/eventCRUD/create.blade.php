@extends('partials.layout')

@section('title','Events Edit')

@section('content')
<div class="container">
    <form method="POST" action="/eventcrud/">
        @csrf

        <div class="form-group">
            <label for="name1">Name</label>
            <input type="text" class="form-control" name="name" id="name1" required>
        </div>
        <div class="form-group">
            <label for="image1">Image</label>
            <input type="text" class="form-control" id="image1" name="image">
        </div>
        <div class="form-group">
            <label for="startdate1">Start date</label>
            <input type="datetime" class="form-control" name="event_start_date" required id="startdate1">
        </div>
        <div class="form-group">
            <label for="enddate1">End date</label>
            <input type="datetime" class="form-control" name="event_end_date" required id="enddate1">
        </div>
        <div class="form-group">
            <label for="maxtickets1">Max tickets</label>
            <input type="number" class="form-control" name="max_amount_tickets" required id="maxtickets1">
        </div>
        <div class="form-group">
            <label for="maxticketsperperson1">Max tickets per person</label>
            <input type="number" class="form-control" name="max_amount_tickets_per_person" required id="maxticketsperperson1">
        </div>
        <div class="form-group">
            <label for="price1">Price</label>
            <input type="number" class="form-control" name="price" id="price1" required min="0" step="0.01">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection