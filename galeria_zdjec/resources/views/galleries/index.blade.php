@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Galerie</h2>

        @foreach($galleries as $gallery)
            <a href="{{"/galleries/" . $gallery->id}}"> {{$gallery -> galleryName}} </a>
        @endforeach

    </div>
@endsection
