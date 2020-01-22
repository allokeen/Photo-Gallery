@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>{{$gallery -> galleryName}}</h2>
        <a href="{{ url('/galleries') }}"><< Back to galleries</a><br><br>
        <a href="{{route("galleries.add", ['id'=>$gallery->id])}}">Add a photo to this gallery!</a><br>
        <a href="{{route("galleries.deletePhoto", ['id'=>$gallery->id])}}">Delete photo</a><br>
        <div class="d-flex flex-row " style="height: 200px;">
        <form method="post" action="{{ route('galleries.edit', $gallery) }}">
            {{ method_field('GET') }}
            {{ csrf_field() }}
            <input type="submit" value="Edit gallery name" class="btn btn-outline-primary btn-sm">
        </form>
        &nbsp
        <form method="post" action="{{ route('galleries.destroy', $gallery) }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <input type="submit" value="Delete gallery" class="btn btn-outline-primary btn-sm">
        </form>
        </div>
        <div class="row">
        @foreach($images as $file)
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 m-auto p-2">
                <div class="card shadow img-thumbnail">
                    <a href = {{"/photos/" . $file->id }}>
                        <img src="/uploads/{{ $file->filename }} " class="img-fluid img-thumbnails">
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
