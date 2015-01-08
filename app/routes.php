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

Route::get('/', function()
{
	$images = Image::all();
	return View::make('gallery')->with('images', $images);
});

Route::get('/upload', function()
{
	return View::make('upload');
});

Route::post('/upload', function()
{
	if (Input::hasFile('image') && Input::file('image')->isValid())
	{
		$image = new Image();
		$image->timestamps = false;
		$image->name = Input::file('image')->getClientOriginalName();
		$image->url = rand();
		$image->save();
		Input::file('image')->move('public/images', $image->url . '.jpg');
		return View::make('upload')->with('success', true);
	}
	else
	{
		return View::make('upload');
	}
});
