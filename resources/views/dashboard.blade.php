@extends('partials.layout')

@section('title','Dashboard')
    
@section('content')
<div class="container" style="margin-top: 30px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

@if (Auth::user()->name == "admin")
    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Event CRUD</div>
                    <div class="card-body">
                        <a class="btn btn-secondary" href="/eventcrud">Edit</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Movies CRUD</div>
                    <div class="card-body">
                        <a class="btn btn-secondary" href="/moviecrud">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
