<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\GalleryPhoto;
use App\Photo;
use App\User;
use Illuminate\Http\Request;

class GalleryPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = User::with('photos')->find( auth()->id() );
        return view('gallery_photos.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Photo $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('gallery_photos.show')->withPhoto($photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GalleryPhoto  $galleryPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryPhoto $galleryPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GalleryPhoto  $galleryPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GalleryPhoto $galleryPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GalleryPhoto  $galleryPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryPhoto $galleryPhoto)
    {
        //
    }
}
