@extends('partials.layout')

@section('title','Cinema')
    
@section('content')
    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('images/movies/'. $movie->image. '')}}" style="width: 100%">
                <h1>{{$movie->movie_name}}</h1>
                @if(App::getLocale() == "en")
                    <p>{{$movie->content2}}</p>                 
                @else
                    <p>{{$movie->content}}</p>
                @endif
                <p><i>€ {{$movie->price}}</i><p>
            </div>
            <div class="col-md-6">
                <h2>{{__('messages.reservation')}}</h2>
                <hr>
                <h3>{{$movie->hall_name}}</h3>
                <table style="width: 300px;">
                    @for ($i = 0; $i < $movie->y_amount; $i++)
                        <tr style="height: 30px;">
                            @for ($j = 0; $j <$movie->x_amount; $j++)
                                <td>
                                    <input type="checkbox" class="chair" name="pos[]" value="{{$i}}-{{$j}}">
                                    <div class="arm-left"></div>
                                    <div class="arm-right"></div>
                                    <div class="back"></div>
                                </td>
                            @endfor
                        </tr>
                    @endfor
                </table>
            </div>
        </div>
    </div>
@endsection