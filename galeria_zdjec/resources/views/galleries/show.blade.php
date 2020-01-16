@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$gallery -> galleryName}}</h2>
        <form action="{{ route('galleries.store') }}" method="post" enctype="multipart/form-data">
        </form>
    </div>
@endsection
