@extends('partials.layout')

@section('title','Movies Edit')

@section('content')
<div class="container">
    <form method="POST" action="/moviecrud/{{$movie->id}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name1">Name</label>
            <input type="text" class="form-control" name="name" id="name1" required value="{{$movie->name}}">
        </div>
        <div class="form-group">
            <label for="imageInput">Content Nederlands</label>
            <textarea class="form-control" rows="6" name="content">{{$movie->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="imageInput">Content English</label>
            <textarea class="form-control" rows="6" name="content2">{{$movie->content2}}</textarea>
        </div>
        <div class="form-group">
            <label for="imageInput">Image</label>
            <input name="input_img" type="file" id="imageInput" accept="image/png, image/gif, image/jpeg">
        </div>
        <div class="form-group">
            <label for="startdate1">Duration</label>
            <input type="number" class="form-control" name="duration" required id="startdate1" value="{{$movie->duration}}">
        </div>
        <div class="form-group">
            <label for="price1">Price</label>
            <input type="number" class="form-control" name="price" id="price1" required min="0" step="0.01" value="{{$movie->price}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection