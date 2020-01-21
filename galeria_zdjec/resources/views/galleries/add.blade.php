@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Pick photos</h3>
        <form action="{{ route('galleries.storeToGallery', ['id'=>$id]) }}" method="post" enctype="multipart/form-data">
            <!-- print success message after file upload  -->
            @if(Session::has('status'))
                <div class="alert alert-success">
                    {{ Session::get('status') }}
                    @php
                        Session::forget('status');
                    @endphp
                </div>
            @endif

            <div class="row">
                @foreach($images->photos as $file)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6 m-auto p-2">

                        <label class="image-checkbox" title="1" id="1">
                            <img src="/uploads/{{ $file->filename }} " class="img-fluid img-thumbnails" />
                            <input type="checkbox" name="{{$file->id}}" id="1" />
                        </label>

                    </div>
                @endforeach
                <span class="text-danger"> {{ $errors->first('filename') }}</span>
            </div>


            <div class="card-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-md"> Upload to gallery</button>
                </div>
                {{ csrf_field() }}
            </div>

        </form>
    </div>
@endsection


