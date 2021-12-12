@extends('partials.layout')

@section('title','Events Management')
    
@section('content')
<div class="container">
    <a href="/restaurantcrud/create" class="btn btn-primary" style="margin-top: 15px">Add</a>
    <table style="width: 100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Open Time</th>
            <th>Close Time</th>
            <th>Aantal zitplaatsen</th>
            <th>Kitchen type</th>
            <th></th>
            <th></th>
            <th></th>
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
                    <td><a href="/restaurantcrud/{{$restaurant->id}}/delete" class="btn btn-danger" role="button" aria-pressed="true">Delete</a></td></td>
                    <td><a href="/restaurantcrud/{{$restaurant->id}}/dashboard" role="button" class="btn btn-warning">Drukte</a></td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection