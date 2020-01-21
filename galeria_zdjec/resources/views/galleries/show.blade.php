@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ url('/galleries') }}"><< Back to galleries</a>
        <br>
        <h2>{{$gallery -> galleryName}}</h2><br>

        <a href="{{route("galleries.add", ['id'=>$gallery->id])}}">Add a photo to this gallery!</a><br><br>

        <form method="post" action="{{ route('galleries.edit', $gallery) }}">
            {{ method_field('GET') }}
            {{ csrf_field() }}
            <input type="submit" value="Edit" class="btn btn-outline-primary btn-sm">
        </form>
        &nbsp
        <form method="post" action="{{ route('galleries.destroy', $gallery) }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <input type="submit" value="Delete" class="btn btn-outline-primary btn-sm">
        </form>
    </div>
@endsection
