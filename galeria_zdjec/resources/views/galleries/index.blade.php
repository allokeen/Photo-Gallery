@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Galerries</h2>

        <a href="{{route("galleries.create")}}">Create new galery!</a><br><br>

        <ul>
            @foreach($galleries as $gallery)
                <li>
                    <a href="{{"/galleries/" . $gallery->token }}"> {{$gallery -> galleryName}} </a>
                </li>
            @endforeach
        </ul>

    </div>
@endsection
