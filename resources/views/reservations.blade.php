@extends('partials.layout')

@section('title','Dashboard')
    
@section('content')
<div class="container">
    <div class="section-event">
        <h2>Evenementen</h2>
        <table style="width: 100%">
            <thead>
              <tr>
                <th>{{__('messages.name')}}</th>
                <th>{{__('messages.location')}}</th>
                <th>{{__('messages.start')}}</th>
                <th>{{__('messages.end')}}</th>
                <th>{{__('messages.price')}}</th>
                <th>{{__('messages.days')}}</th>
                <th>csv</th>
                <th>json</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($event as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->location}}</td>
                        <td>{{$item->event_start_date}}</td>
                        <td>{{$item->event_end_date}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->days}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
              
                
            </tbody>
            </table>
    </div>
</div>
@endsection