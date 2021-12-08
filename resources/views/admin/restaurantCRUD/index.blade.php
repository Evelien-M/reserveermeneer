@extends('partials.layout')

@section('title','Events Management')
    
@section('content')
<div class="container">
    <a href="/restaurantcrud/create">Add</a>
    <table style="width: 100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Open Time</th>
            <th>Close Time</th>
            <th>Aantal zitplaatsen</th>
            <th>Kitchen type</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($restaurants as $restaurant)
                <tr>
                    <td>{{$restaurant->name}}</td>
                    <td>{{$restaurant->open_time}}</td>
                    <td>{{$restaurant->close_time}}</td>
                    <td>{{$restaurant->amount_seats}}</td>
                    <td>{{$restaurant->kitchen_type}}</td>
                    <td><a href="/restaurantcrud/{{$restaurant->id}}/edit" class="btn btn-primary" role="button" aria-pressed="true">Edit</a></td>
                    <td><button type="button" class="btn btn-danger">Delete</button></td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection