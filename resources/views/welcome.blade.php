@extends('partials.layout')

@section('title','Dashboard')
    
@section('content')
<div class="jumbotron">
    <div class="container">
        <h1 class="display-4">Reserveermeneer</h1>
        <p class="lead">{{__('messages.welcometext')}}</p>
        <hr class="my-4">
        <p class="lead">
        <a class="btn btn-primary btn-lg" href="/event" role="button">{{__('messages.events')}}</a>
        <a class="btn btn-primary btn-lg" href="/event" role="button">{{__('messages.cinema')}}</a>
        <a class="btn btn-primary btn-lg" href="/event" role="button">Restaurant</a>    
    </p>
    </div>
</div>
@endsection