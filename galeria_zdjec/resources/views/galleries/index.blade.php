@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Galleries</h2>
        <a href="{{ url('/photos') }}"><< Back to all photos</a><br><br>
        <a href="{{route("galleries.create")}}">Create a new gallery!</a><br><br>

        <ul>
            @foreach($galleries as $gallery)
                <li>
                    <a href="{{"/galleries/" . $gallery->token }}"> {{$gallery -> galleryName}} </a>
                </li>
            @endforeach
        </ul>

    </div>
@endsection
