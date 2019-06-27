@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card-deck">
                <div class="card">
                    <img src="{{ asset('images\/').$album->cover_image }}" class="card-img-top" alt="Nothing to show">
                </div>
            </div>
        </div>

        <div class="offset-1 col-md-4">
            <h5 class="card-title">{{ $album->name }}</h5>
            <h5 class="card-title">{{ $album->description }}</h5>
            <p class="card-text"><small class="text-muted">Last updated {{ $album->updated_at->diffForHumans()  }}</small></p>

        </div>

        <div class="col-md-2">
            <a href="{{ $album->id }}/images/create" class="btn btn-primary">Add Image</a>
        </div>
    </div>
        <br>
        <br>
    <h3 class="text-center">Images in Album</h3>
    <div class="row">
        @foreach($album->images as $image)
            <div class="card" style="margin: 10px;">
                <div class="card-header">
                    <strong class="card-title">{{ $image->name }}</strong>
                    <button class="btn btn-danger float-right">Remove</button>

                </div>
                <div class="card-body">
                    <img src="{{ asset('images\/').$image->image }}" class="card-img-top" alt="Nothing to show">

                </div>

                <div class="card-footer">
                    <p class="card-title">{{ $image->description }}</p>

                </div>
            </div>


        @endforeach
    </div>
    </div>

@endsection