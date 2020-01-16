@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <a href="{{ url('/galleries') }}"><< Back to galleries</a>
        <form action="{{ route('galleries.createGallery') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                    <div class="card shadow">
                        <div class="card-header bg-info text-white">
                            <div class="card-title ">
                                <h4> Create new gallery </h4>
                            </div>
                        </div>

                        <div class="card-body">

                            <!-- print success message after file upload  -->
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif

                            <div class="form-group" {{ $errors->has('filename') ? 'has-error' : '' }}>
                                <label for="filename"></label>
                                <p>Gallery Name</p>
                                <input type="text" name="galleryName" id="galleryName" class="form-control"><br>
                                <span class="text-danger"> {{ $errors->first('galleryName') }}</span>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-md"> Upload </button>
                            </div>
                            {{ csrf_field() }}
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
