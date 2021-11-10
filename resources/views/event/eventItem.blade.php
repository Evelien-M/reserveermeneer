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
                <h2>Reservering</h2>
                <form method="POST" action="/eventItem/" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="event_id" value="{{$event->id}}">
                    <div class="form-group">
                        <label for="imageInput">Image</label><br>
                        <input name="input_img" type="file" required id="imageInput" accept="image/png, image/gif, image/jpeg">
                    </div>
                    <p>Dagen</p>
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
                        <label for="inputAddress">Zipcode</label>
                        <input type="text" class="form-control" name="zipcode" id="inputAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" name="address" id="inputAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">City</label>
                        <input type="text" class="form-control" name="city" id="inputAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">House number</label>
                        <input type="text" class="form-control" name="house_number" id="inputAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Country</label>
                        <input type="text" class="form-control" name="country" id="inputAddress" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Reserveer</button>
                </form>
            </div>
        </div>
    </div>
@endsection