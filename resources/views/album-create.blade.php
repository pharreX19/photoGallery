@extends('layouts.app')

@section('content')

<div class="container col-md-6">
    <h3 class="text-center">Create a new Album</h3>
<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    
    <label for="album">Album Name</label>
    <input type="text" name="album" class="form-control" id="album" aria-describedby="albumHelp" placeholder="Enter album name">
    <small id="albumHelp" class="form-text text-muted">We'll never share your album with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="description">Album Description</label>
    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
  </div>
  
  <div class="form-group">
    <label for="coverImage">Select a Cover Image</label>
    <input type="file" name="coverImage" class="form-control-file" id="coverImage">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
   
@endsection