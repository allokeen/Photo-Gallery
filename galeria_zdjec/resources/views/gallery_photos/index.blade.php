@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Choose a photo you want to add</h2>

        <div class="row">
            @foreach($images->photos as $file)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 m-auto p-2">
                    <div class="card shadow img-thumbnail">
                        <a href = {{"/gallery_photos/" . $file->id }}>
                            <img src="/uploads/{{ $file->filename }} " class="img-fluid img-thumbnails">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
