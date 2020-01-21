@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <a href="{{ url('/galleries') }}"><< Back to galleries</a>

        <form method="post" action="{{ route('galleries.update', $gallery) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            Gallery Name: <input type="text" name="galleryName" id="galleryName" value="{{ $gallery->dgalleryName }}">
            <input type="submit" value="Update">
        </form>
    </div>
@endsection
