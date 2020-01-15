@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ url('/photos') }}"><< Back to gallery</a>
        <img src="/uploads/{{ $photo->filename }} " class="img-fluid img-thumbnails">
        <br><br>
        <p class="text-muted">{{$photo->description}}</p>
        <form method="post" action="{{ route('photos.edit', $photo) }}">
            {{ method_field('GET') }}
            {{ csrf_field() }}
            <input type="submit" value="Edit" class="btn btn-outline-primary btn-sm">
        </form>
        <br>
        <form method="post" action="{{ route('photos.destroy', $photo) }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <input type="submit" value="Delete" class="btn btn-outline-primary btn-sm">
        </form>
    </div>
@endsection
