@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('gallery_photos.store') }}" method="post" enctype="multipart/form-data">
            <!-- print success message after file upload  -->
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif

            <div class="row">
                @foreach($images->photos as $file)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 m-auto p-2">
                        <label class="image-checkbox" title="imageID" id="{{$file->id}}">
                            <img src="/uploads/{{ $file->filename }} " class="img-fluid img-thumbnails" />
                            <input type="checkbox" name="imageID" id value="italy" />
                        </label>
                    </div>
                @endforeach
                <span class="text-danger"> {{ $errors->first('filename') }}</span>
            </div>


            <div class="card-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md"> Upload </button>
                </div>
                            {{ csrf_field() }}
            </div>

        </form>
    </div>
@endsection


