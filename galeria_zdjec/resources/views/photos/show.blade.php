@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/uploads/{{ $photo->filename }} " class="img-fluid img-thumbnails">
    </div>
@endsection
