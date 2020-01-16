@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$gallery -> galleryName}}</h2>
        <a href="{{route("")}}"></a>
    </div>
@endsection
