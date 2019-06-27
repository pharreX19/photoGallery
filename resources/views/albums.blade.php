@extends('layouts.app')

@section('content')

    <div class="container">
        <section class="jumbotron text-center">
            <h3 class="jumbotron-heading">{{ Auth::user()->name }}'s Albums</h3>
            <strong>Viewing a Total of {{ count($albums) }} Albums</strong>
        </section>


        <div class="row">
            @foreach($albums as $album)
                <div class="col-md-3">
                    <div class="card-deck">
                        <div class="card">

                            <a href="{{ url('albums\/').$album->id }}">
                                <img src=" images/{{ $album->cover_image }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $album->description }}</h5>
                                <p class="card-text"><small class="text-muted">Last updated {{ $album->updated_at->diffForHumans()  }}</small></p>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
    </div>

@endsection