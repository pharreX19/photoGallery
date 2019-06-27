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
Route::get('albums/create', 'AlbumsController@create');
Route::post('albums/store', 'AlbumsController@store')->name('store');

Route::get('albums', 'AlbumsController@index')->name('albums');

Route::get('albums/{id}','AlbumsController@show');

Route::get('albums/{id}/images/create','ImagesController@create');
Route::post('albums/{id}/images','ImagesController@store')->name('image.store');