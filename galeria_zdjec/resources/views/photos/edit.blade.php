@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/uploads/{{ $photo->filename }} " class="img-fluid img-thumbnails">
        <form method="post" action="{{ route('photos.update', $photo) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            Description: <input type="text" name="description" id="description" value="{{ $photo->description }}">
            <input type="submit" value="Update">
        </form>

    </div>
@endsection
