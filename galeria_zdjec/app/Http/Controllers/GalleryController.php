<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Hash;
use Config;

class GalleryController extends Controller
{
    public function __construct() {
        $this->middleware('linkshare')->only('show');
        $this->middleware('auth', ['except' => array('show')]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('galleries.index')->withGalleries($galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = User::with('photos')->find( auth()->id() );
        return view('galleries.create', compact('images'));
    }

    public function add($id)
    {
        $images = User::with('photos')->find( auth()->id() );
        return view('galleries.add')->withId($id)->withImages($images);
    }

    public function createGallery(Request $request)
    {
        $validator = Validator::make($request->all(),
            ['galleryName' => 'required:galleryName']);

        // if validation fails
        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        //if gallery with that name exists
        if(Gallery::where('galleryName', '=', $request->galleryName )->count() > 0){
            return back()->with('galleryNameExists', "Gallery named " . $request->galleryName . " exists! Choose another name.");
        }

        else {
            $gallery = new Gallery();
            $gallery->token = base64_encode(Hash::make($gallery->id . Config::get('APP_KEY')));
            $gallery->galleryName = $request->galleryName;
            $gallery->save();

            return back()->with("success", "Gallery created successfully");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return view('galleries.show')->withGallery($gallery);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('galleries.edit')->withGallery($gallery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //if gallery with that name exists
        if(Gallery::where('galleryName', '=', $request->galleryName )->count() > 0){
            return back()->with('galleryNameExists', "Gallery named " . $request->galleryName . " exists! Choose another name.");
        }
        $gallery->galleryName = $request -> galleryName;
        $gallery->save();
        return redirect()->route('galleries.show', $gallery);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('galleries.index');
    }
}
