<?php

namespace App\Http\Controllers;

use App\User;
use App\Gallery;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            ['filename'      =>   'required|mimes:jpeg,png,jpg,bmp|max:2048']);

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
                $image   =   Photo::create(['filename' => $name, 'user_id' => auth()->id() ]);

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
