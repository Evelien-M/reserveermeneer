@extends('partials.layout')

@section('title','Events')
    
@section('content')
    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col-md-8">
                <img src="{{asset('images/events/'. $event->image. '')}}" style="width: 100%">
                <h1>{{$event->name}}</h1>
                <p>{{$event->content}}</p>
                <p><i>€ {{$event->price}}</i><p>
            </div>
            <div class="col-md-4">
                <h2>{{__('messages.reservation')}}</h2>
                <form method="POST" action="/eventItem/" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <div class="form-group">
                        <label for="imageInput">{{__('messages.image')}}</label><br>
                        <input name="input_img" type="file" required id="imageInput" accept="image/png, image/gif, image/jpeg">
                    </div>
                    <p>{{__('messages.days')}}</p>
                    <?php $i = 0; ?>
                    @foreach ($dayslist as $day)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="datecheck[]" value="{{$day}}" id="check{{$day}}">
                            <label class="form-check-label" for="check{{$day}}">
                            {{$day}}
                            </label>
                        </div>
                        <?php $i++; ?>
                    @endforeach
                    <br>
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
                    <div class="form-group">
                        <label for="inputAmount">{{__('messages.amount')}}</label>
                        <input type="number" class="form-control" name="amount" id="inputAmount" value="1" required min="1" max="{{$event->max_amount_tickets_per_person}}">
                    </div>
                    <div class="form-inline">
                        <button type="submit" class="btn btn-primary">{{__('messages.book')}}</button>
                        <p> {{$ticketsLeft}} {{__('messages.ticketsleft')}}</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection