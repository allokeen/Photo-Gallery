<?php

namespace App\Http\Controllers;

use App\User;
use App\Gallery;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = User::with('photos')->find( auth()->id() );
        return view('photos.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator      =   Validator::make($request->all(),
            ['filename'      =>   'required|mimes:jpeg,png,jpg,bmp|max:2048',
            'description' => 'required']);
        // if validation fails
        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        // if validation success
        if($image   =   $request->file('filename')) {

            $name      =   time().time().'.'.$image->getClientOriginalExtension();

            $target_path    =   public_path('/uploads/');

            if($image->move($target_path, $name)) {

                // save file name in the database
                $image = Photo::create(['filename' => $name, 'user_id' => auth() -> id(), 'description' => $request->description]);
                return back()->with("success", "File uploaded successfully");
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('photos.show')->withPhoto($photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        return view('photos.edit')->withPhoto($photo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        $photo->description = $request -> description;
        $photo->save();
        return redirect()->route('photos.show', $photo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $file= $photo->filename;
        $filename = public_path().'/uploads/'.$file;
        \File::delete($filename);

        $photo->delete();
        return redirect()->route('photos.index');
    }
}
