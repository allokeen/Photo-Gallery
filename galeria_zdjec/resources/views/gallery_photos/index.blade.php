@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($images->photos as $file)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 m-auto p-2">
                    <label class="image-checkbox" title="{{$file->id}}">
                        <img src="/uploads/{{ $file->filename }} " class="img-fluid img-thumbnails" />
                        <input type="checkbox" name="team[]" value="italy" />
                    </label>
                </div>
            @endforeach
        </div>

    </div>
@endsection
