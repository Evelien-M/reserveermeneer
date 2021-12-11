@extends('partials.layout')

@section('title','Events Management')
    
@section('content')
<div class="jumbotron">
    <h1 class="display-4 text-center">{{$restaurant->name}}</h1>
</div>

<div class="container">
    <table style="width: 100%">
        <tr>
            <th>Day</th>
            <th>Time</th>
            <th>Total</th>
        </tr>
        
        @foreach ($results as $item)
            <tr>
                <th>{{$item->day}}</th>
                <th>{{$item->time}}</th>
                <th>{{$item->total}}</th>
            </tr>
        @endforeach
        
    </table>
</div>
@endsection

