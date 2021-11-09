@extends('partials.layout')

@section('title','Events Management')
    
@section('content')
  <div class="container">
    <a href="/eventcrud/create">Add</a>
    <table style="width: 100%">
        <thead>
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Start</th>
            <th>End</th>
            <th>Max ticket</th>
            <th>Max ticket per person</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td><img src="{{asset('images/events/'. $event->image. '')}}" style="height: 45px"></td>
                    <td>{{$event->name}}</td>
                    <td>{{$event->event_start_date}}</td>
                    <td>{{$event->event_end_date}}</td>
                    <td>{{$event->max_amount_tickets}}</td>
                    <td>{{$event->max_amount_tickets_per_person}}</td>
                    <td>{{$event->price}}</td>
                    <td><a href="/eventcrud/{{$event->id}}/edit" class="btn btn-primary" role="button" aria-pressed="true">Edit</a></td>
                    <td><button type="button" class="btn btn-danger">Delete</button></td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    @endsection