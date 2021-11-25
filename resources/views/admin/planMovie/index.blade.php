@extends('partials.layout')

@section('title','Movies Management')

@section('content')
<div class="jumbotron">
    <h1 class="display-4 text-center">{{$movie->name}}</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Datum:</h3>
            <form method="POST" action="/planmovie/{{$movie->id}}/">
                @csrf
                <div class="form-group">
                    <label for="aastart">Start date:<label>
                    <input type="datetime-local" class="form-control" value="{{$startdate}}" id="aastart" name="startdate" required>
                </div>
                <input type="submit" class="btn btn-primary" value="Update"> 
            </form>
        </div>
        <div class="col-md-6">
            <h3>Zalen:</h3>
            @if (count($halls) > 0)
                <form method="POST" action="/planmovie/{{$movie->id}}/hall">
                    <input type="hidden" name="movie_start_date" value="{{$startdate}}">
                    <input type="hidden" name="duration" value="{{$movie->duration}}">
                    @csrf
                    @foreach ($halls as $hall)
                    <input type="radio" id="abc{{$hall->id}}" name="selectedhall" value="{{$hall->id}}">
                    <label for="abc{{$hall->id}}">{{$hall->name}} <i>(Capaciteit: {{$hall->x_amount * $hall->y_amount}})</i></label><br>
                    @endforeach

                    <input type="submit" value="Add" class="btn btn-primary">
                </form>
            @endif
        </div>
    </div>
</div>
@endsection