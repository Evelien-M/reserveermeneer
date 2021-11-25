@extends('partials.layout')

@section('title','Bioscoop')
    
@section('content')
<div class="jumbotron">
    <h1 class="display-4 text-center">Bioscoop</h1>
</div>


<div class="cinema-content">
    <div class="container">
        <div class="row">
            @foreach ($movies as $movie)
                <div class="col-3">
                    <div class="card" style="width: 16rem; margin-top: 30px;">
                        <img class="card-img-top" src="{{asset('images/movies/'. $movie->image. '')}}" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title">{{$movie->movie_name}}</h5>
                        <p class="card-text">{{__('messages.start')}}: {{$movie->movie_start_date}}</p>
                        <p class="card-text">{{__('messages.end')}}: {{$movie->movie_end_date}}</p>
                        <a href="/cinema/{{$movie->id}}" class="btn btn-primary">{{__('messages.buttonview')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


@endsection