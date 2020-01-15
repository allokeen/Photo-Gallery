@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/uploads/{{ $photo->filename }} " class="img-fluid img-thumbnails">
        <p>{{$photo->description}}</p>
        <a href={{ route('photos.edit', $photo) }}>Edytuj</a>
        <br>
        <a href={{ route('photos.destroy', $photo) }}>Usuń</a>
    </div>
@endsection
