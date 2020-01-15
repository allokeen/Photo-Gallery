@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/uploads/{{ $photo->filename }} " class="img-fluid img-thumbnails">
        <p>{{$photo->description}}</p>
        <a href={{ route('photos.edit', $photo) }}>Edytuj</a>
        <br>
        <form method="post" action="{{ route('photos.destroy', $photo) }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <input type="submit" value="Delete">
        </form>
    </div>
@endsection
