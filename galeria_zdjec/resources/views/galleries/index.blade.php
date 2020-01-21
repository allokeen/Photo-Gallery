@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Galeries</h2>

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
