@extends('partials.layout')

@section('title','Events Edit')

@section('content')
<div class="container">
    <form method="POST" action="/moviecrud/" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name1">Name</label>
            <input type="text" class="form-control" name="name" id="name1" required>
        </div>
        <div class="form-group">
            <label for="imageInput">Content Nederlands</label>
            <textarea class="form-control" rows="6" name="content"></textarea>
        </div>
        <div class="form-group">
            <label for="imageInput">Content English</label>
            <textarea class="form-control" rows="6" name="content2"></textarea>
        </div>
        <div class="form-group">
            <label for="imageInput">Image</label>
            <input name="input_img" type="file" id="imageInput" accept="image/png, image/gif, image/jpeg">
        </div>
        <div class="form-group">
            <label for="startdate1">Duration</label>
            <input type="number" class="form-control" name="duration" required id="startdate1">
        </div>
        <div class="form-group">
            <label for="price1">Price</label>
            <input type="number" class="form-control" name="price" id="price1" required min="0" step="0.01">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection