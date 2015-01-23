<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// HOME PAGE ===================================


Route::get('/', function () {
    return View::make('layout');
});

// API ROUTES ==================================
Route::group(array('prefix' => 'api'), function () {

    Route::resource('images', 'GalleryController', array('only' => array('index', 'store', 'destroy')));
    Route::any('upload', 'GalleryController@uploadImage');
});

// CATCH ALL ROUTE =============================
App::missing(function ($exception) {
    return View::make('layout');
});


//Route::get('/pictures','ImageController@getImages');

//Route::get('/upload', function()
//{
//	return View::make('upload');
//});
//
//Route::post('/upload','ImageController@uploadImage');
