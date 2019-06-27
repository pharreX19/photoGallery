@extends('layouts.app')

@section('content')

    <div class="container col-md-6">
        <h3 class="text-center">Add new Image</h3>
        <form action="{{ route('image.store',['id' => $albumId]) }}" method="POST" enctype="multipart/form-data">
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

                <label for="name">Image Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter image name">
                <small id="nameHelp" class="form-text text-muted">We'll never share your album with anyone else.</small>
            </div>

            <div class="form-group">
                <label for="description">Image Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Select an Image</label>
                <input type="file" name="image" class="form-control-file" id="image">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>

@endsection