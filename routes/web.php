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
});

Route::get('/edit/{nickname}', 'RappersController@edit')->name('rappers.edit');
Route::get('/', 'HomepageController@index')->name('homepage');
Route::get('/rappers', 'RappersController@index')->name('rappers.index');
Route::get('/@{nickname}', 'RappersController@show')->name('rappers.show');
Auth::routes();

Route::get('/home', 'HomeController@index');
