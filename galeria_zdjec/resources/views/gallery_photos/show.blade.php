@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ url('/gallery_photos') }}"><< Back</a><br><br>
        <img src="/uploads/{{ $photo->filename }} " class="img-fluid img-thumbnails">
        <br><br>
        <p class="text-muted">{{$photo->description}}</p>
        <form method="post" action="{{ route('gallery_photos.create', $photo) }}">
            {{ method_field('GET') }}
            {{ csrf_field() }}
            <input type="submit" value="Add" class="btn btn-outline-primary btn-sm">
        </form>


    </div>
@endsection
