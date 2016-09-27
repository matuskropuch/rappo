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

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/rappers', 'RappersController@index')->name('rappers.index');
Route::get('/rappers/create', 'RappersController@create')->name('rappers.create');
Route::post('/rappers', 'RappersController@store')->name('rappers.store');
Route::get('/@{nickname}', 'RappersController@show')->name('rappers.show');