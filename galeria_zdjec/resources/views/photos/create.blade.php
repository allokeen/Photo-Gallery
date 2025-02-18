@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <a href="{{ url('/photos') }}"><< Back to all photos</a>
        <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                    <div class="card shadow">
                        <div class="card-header bg-info text-white">
                            <div class="card-title ">
                                <h4> Upload file </h4>
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
                                <input type="file" name="filename" id="filename" class="form-control"><br>
                                <input type="text" name="description" id="description" placeholder="Description" class="form-control">
                                <span class="text-danger"> {{ $errors->first('filename') }}</span>
                                <span class="text-danger"> {{ $errors->first('description') }}</span>
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
        </form>
    </div>
@endsection
