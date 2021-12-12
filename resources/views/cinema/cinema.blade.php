@extends('partials.layout')

@section('title','Bioscoop')
    
@section('content')
<div class="jumbotron">
    <h1 class="display-4 text-center">Bioscoop</h1>
</div>

<div class="container filter">
    <form method="GET" action="/cinema">
        <div class="row">
            <div class="col-md-6">
                <h3>Filter:</h3>
                <div class="form-group">
                    <label for="exampleFormControlInput1">{{__('messages.name')}}</label>
                    <input type="text" value="{{$filter_name}}" name="name" class="form-control" id="exampleFormControlInput1">
                </div>
                <input type="submit" class="btn btn-primary" value="Filter"/>
            </div>
            <div class="col-md-6">
                <h3>{{__('messages.sort')}}:</h3>
                <select class="form-control" name="order">
                    <option value="movies.name-DESC" {{$sort_order == "name-DESC" ? 'selected' : ''}}>{{__('messages.namedesc')}}</option>
                    <option value="movies.name-ASC" {{$sort_order == "name-ASC" ? 'selected' : ''}}>{{__('messages.nameasc')}}</option>
                    <option value="halls_has_movies.movie_start_date-DESC" {{$sort_order == "movie_start_date-DESC" ? 'selected' : ''}}>{{__('messages.datedesc')}}</option>
                    <option value="halls_has_movies.movie_start_date-ASC" {{$sort_order == "movie_start_date-ASC" ? 'selected' : ''}}>{{__('messages.dateasc')}}</option>
                </select>
                <input type="submit" style="margin-top: 15px" class="btn btn-primary" value="Sorteer"/>
            </div>
        </div>
    </form>
</div>
<hr>

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