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
Route::get('galleries/{id}/addToGallery', 'GalleryController@add') -> name('galleries.add');
Route::post('galleries/{token}', 'GalleryController@show');
Route::post('galleries/deletePhoto', 'GalleryController@deletePhoto')->name('galleries.deletePhoto');
Route::match(['get', 'post'], 'galleries/{id}/addToGallery/storeToGallery', 'GalleryController@storeToGallery')->name('galleries.storeToGallery');

Route::resource('/galleries', "GalleryController");
Route::resource('/photos', "PhotoController")->middleware('auth');
Route::resource('/gallery_photos', "GalleryPhotoController");
