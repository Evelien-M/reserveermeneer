@extends('partials.layout')

@section('title','Movies Management')

@section('content')
  <div class="container">
    <a href="/moviecrud/create" class="btn btn-primary" style="margin-top: 15px">Add</a>
    <table style="width: 100%">
        <thead>
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th>duration</th>
            <th>Price</th>
            <th></th>
            <th></th>
            <th></th>
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
                    <td><a href="/moviecrud/{{$movie->id}}/delete" class="btn btn-danger" role="button" aria-pressed="true">Delete</a></td>
                    <td><a class="btn btn-warning" href="/planmovie/{{$movie->id}}">Plan</a></td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    @endsection