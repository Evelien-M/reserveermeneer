@extends('partials.layout')

@section('title','Moevies Management')

@section('content')
  <div class="container">
    <a href="/moviecrud/create">Add</a>
    <table style="width: 100%">
        <thead>
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>duration</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td><img src="{{asset('images/movies/'. $movie->image. '')}}" style="height: 45px"></td>
                    <td>{{$movie->name}}</td>
                    <td>{{$movie->duration}}</td>
                    <td>{{$movie->price}}</td>
                    <td><a href="/moviecrud/{{$movie->id}}/edit" class="btn btn-primary" role="button" aria-pressed="true">Edit</a></td>
                    <td><button type="button" class="btn btn-danger">Delete</button></td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    @endsection