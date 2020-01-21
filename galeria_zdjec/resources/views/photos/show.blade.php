@extends('layouts.app')

@section('content')
    <div class="container ">
        <a href="{{ url('/photos') }}"><< Back to main gallery</a>

        <div class = "d-flex justify-content-center">
        <div class="card " style="width: 45rem;">
            <img class="card-img-top" src="/uploads/{{ $photo->filename }} " alt="Card image cap mg-fluid img-thumbnails">
            <div class="card-body  ">
                <p class="card-text">{{$photo->description}}</p>
            </div>
        </div>
        </div>
        <div class="d-flex flex-row " style="height: 200px;">

        <form method="post" action="{{ route('photos.edit', $photo) }}">
            {{ method_field('GET') }}
            {{ csrf_field() }}
            <input type="submit" value="Edit" class="btn btn-outline-primary btn-sm">
        </form>
            &nbsp
        <form method="post" action="{{ route('photos.destroy', $photo) }}">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <input type="submit" value="Delete" class="btn btn-outline-primary btn-sm">
        </form>
    </div>
@endsection
