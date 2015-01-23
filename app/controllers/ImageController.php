<?php

/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 09.01.2015
 * Time: 23:03
 */
class ImageController extends BaseController
{

    public function getAllImages()
    {
        $images = Image::all();
        return View::make('gallery')->with('images', $images);
    }

    public function getImages()
    {
        $images = Image::all();
        return Response::json($images);
    }

    public function uploadImage()
    {
        $validationResult = ImageController::validateImage();
        if ($validationResult === true) {
            // save to database
            $image = new Image();
            $image->timestamps = false;
            $image->name = Input::file('image')->getClientOriginalName();
            $image->url = rand();
            $image->save();

            //save image file
            Input::file('image')->move('public/images', $image->url . '.jpg');

        }
        return Response::json($validationResult);
    }

    private function validateImage()
    {

        // getting all of the post data
        $file = array(
            'image' => Input::file('image')
        );
        // setting up rules
        $rules = array(
            'image' => 'required|image|max:1000' //mimes:jpeg,bmp,png and max size 10000 kb
        );

        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return false; //Redirect::to('upload')->withInput()->withErrors($validator);
        } else return true;
    }

}