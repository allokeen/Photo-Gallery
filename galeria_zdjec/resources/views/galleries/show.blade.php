@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$gallery -> galleryName}}</h2>

        <a href="{{route("galleries.add", ['id'=>$gallery->id])}}">Add a photo to this gallery!</a><br><br>

    </div>
@endsection
