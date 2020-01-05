@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Wassup amma gallery</h2>

        <a href="{{route("galleries.create")}}">Załaduj nowe zdjęcie!</a>

        <div class="row">
            @foreach($images as $file)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 m-auto p-2">
                    <div class="card shadow">
                        <div class="card-body">
                            <img src="/uploads/{{ $file->filename }} " class="img-fluid img-thumbnails">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
