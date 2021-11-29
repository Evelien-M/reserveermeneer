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
                <form method="POST" action="/cinemaItem/" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="halls_has_movies_id" value="{{$movie->id}}">
                    <table style="width: 300px;">
                        @for ($y = 0; $y < $movie->y_amount; $y++)
                            <tr style="height: 30px;">
                                @for ($x = 0; $x <$movie->x_amount; $x++)
                                    <td>
                                        @if ($reservation[$x][$y] == 0)
                                        <input type="checkbox" class="chair" name="pos[]" value="{{$x}}-{{$y}}">
                                        <div class="arm-left"></div>
                                        <div class="arm-right"></div>
                                        <div class="back"></div>
                                        @elseif ($reservation[$x][$y] == 2)
                                        <input type="checkbox" class="chair" name="pos[]" disabled value="{{$x}}-{{$y}}">
                                        <div class="cross"></div>
                                        <div class="cross2"></div>
                                        @else
                                        <input type="checkbox" class="chair" name="pos[]" disabled value="{{$x}}-{{$y}}">
                                        @endif
                                        
                                        
                                    </td>
                                @endfor
                            </tr>
                        @endfor
                    </table>
                    <div class="form-group">
                        <label for="inputa">{{__('messages.zipcode')}}</label>
                        <input type="text" class="form-control" name="zipcode" id="inputa" required>
                    </div>
                    <div class="form-group">
                        <label for="inputb">{{__('messages.address')}}</label>
                        <input type="text" class="form-control" name="address" id="inputb" required>
                    </div>
                    <div class="form-group">
                        <label for="inputc">{{__('messages.city')}}</label>
                        <input type="text" class="form-control" name="city" id="inputc" required>
                    </div>
                    <div class="form-group">
                        <label for="inputd">{{__('messages.housenumber')}}</label>
                        <input type="text" class="form-control" name="house_number" id="inputd" required>
                    </div>
                    <div class="form-group">
                        <label for="inpute">{{__('messages.country')}}</label>
                        <input type="text" class="form-control" name="country" id="inpute" required>
                    </div>
                    <div class="form-inline">
                        @if ($ticketsLeft == 0)
                        <div class="alert alert-danger" role="alert">
                            {{__('messages.soldout')}}
                          </div>
                        @else
                            <button type="submit" class="btn btn-primary">{{__('messages.book')}}</button>
                            <p> {{$ticketsLeft}} {{__('messages.ticketsleft')}}</p>
                        @endif
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection