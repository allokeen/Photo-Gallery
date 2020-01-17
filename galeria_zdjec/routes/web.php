<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('galleries/createGallery', 'GalleryController@createGallery') -> name('galleries.createGallery');
Route::post('galleries/generateToken', 'GalleryController@generateToken') -> name('galleries.generateToken');
Route::get('galleries/{token}', 'GalleryController@show');
Route::get(view('galleries.show'),'GalleryController@show')->middleware('linkshare');
Route::resource('/galleries', "GalleryController")->middleware('auth');
Route::resource('/photos', "PhotoController")->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
