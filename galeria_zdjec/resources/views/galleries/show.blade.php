@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$gallery -> galleryName}}</h2>

        <a href="{{route("gallery_photos.index")}}">Add a photo to this gallery</a>

    </div>
@endsection
