@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <a href="{{ url('/galleries') }}"><< Back to galleries</a>
        <form method="post" action="{{ route('galleries.update', $gallery) }}">
            {{ method_field('PUT') }}
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

                            <div class="form-group" {{ $errors->has('galleryName') ? 'has-error' : '' }}>
                                <label for="filename"></label>
                                new gallery name: <input type="text" name="galleryName" id="galleryName" value="{{ $gallery->galleryName }}">
                                <span class="text-danger"> {{ $errors->first('galleryName') }}</span>

                                @if(Session::has('galleryNameExists'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('galleryNameExists') }}
                                        @php
                                            Session::forget('galleryNameExists');
                                        @endphp
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="form-group">
                                <input type="submit" value="Update">
                            </div>
                            {{ csrf_field() }}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
