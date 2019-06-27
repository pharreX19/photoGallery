@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">{{ Auth::user()->name }}'s Albums</h1>
      <p class="lead text-muted">{{Auth::user()->email}}</p>
      <p>
      <a href="{{ url('albums/create')}}" class="btn btn-primary my-2">Add Album</a>
      <a href="{{ url('albums') }}" class="btn btn-secondary my-2">View All</a>
          <p>TOTAL of {{ count($recentAlbums) }} ALBUMS</p>
      </p>
    </div>
  </section>


        </div>
    </div>
    
    <div class="row">
        @foreach($recentAlbums as $recentAlbum)
            @if($loop->index==6)
                @break
            @endif
        <div class="col-md-2">
            <div class="card-deck">
                <div class="card">
                    <img src=" images/{{ $recentAlbum->cover_image }}" class="card-img-top" alt="...">
                    <div class="card-body">

                        <h5 class="card-title">{{ $recentAlbum->description }}</h5>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>

        </div>

    </div>
        @endforeach
</div>
@endsection
