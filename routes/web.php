<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['middleware' => 'auth'], function() {
    Route::post('/rappers', 'RappersController@store')->name('rappers.store');
    Route::post('/rappers/{id}', 'RappersController@update')->name('rappers.update');
    Route::get('/rappers/create', 'RappersController@create')->name('rappers.create');
    Route::get('/rappers/edit/{nickname}', 'RappersController@edit')->name('rappers.edit');

    Route::post('/rappers/{id}/albums', 'AlbumsController@store')->name('albums.store');
    Route::post('/albums/{id}', 'AlbumsController@update')->name('albums.update');
    Route::get('/rappers/{id}/albums/create', 'AlbumsController@create')->name('albums.create');
    Route::get('/albums/edit/{id}', 'AlbumsController@edit')->name('albums.edit');
});

Route::get('/', 'HomepageController@index')->name('homepage');

Route::get('/rappers', 'RappersController@index')->name('rappers.index');
Route::get('/@{nickname}', 'RappersController@show')->name('rappers.show');

Route::get('/albums', 'AlbumsController@index')->name('albums.index');
Route::get('/albums/{id}', 'AlbumsController@show')->name('albums.show');

Auth::routes();
Route::get('/home', 'HomeController@index');
