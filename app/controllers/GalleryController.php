<?php

class GalleryController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Response::json(Image::orderBy('order')->paginate(2));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param $title
     * @param $url
     * @return Response
     */
    private function store($title, $url, $fileExtension)
    {
        $image = new Image();
        $image->timestamps = false;
        $image->title = $title;
        $image->url = $url;
        $image->fileExtension = $fileExtension;
        $image->save();
        return Response::json(array('success' => true));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Image::destroy($id);
        return Response::json(array('success' => true));
    }

    public function uploadImage()
    {
        $request = new \Flow\Request();
        $filename = Rhumsaa\Uuid\Uuid::uuid4();
        $destination = public_path() . '/images/uploads/' . $filename;
        $config = new \Flow\Config(array(
            'tempDir' => public_path() . '/images/chunks'
        ));
        $file = new \Flow\File($config, $request);
        var_dump('test');

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (!$file->checkChunk()) {
                return Response::make('', 404);
            }
        } else {
            if ($file->validateChunk()) {
                $file->saveChunk();
            } else {
                // error, invalid chunk upload request, retry
                return Response::make('', 400);
            }
        }

        if ($file->validateFile() && $file->save($destination)) {
            $imageType = $this->validateImage($destination);

            var_dump($imageType);
            switch ($imageType) {
                case IMAGETYPE_JPEG:
                    $fileExtension = ".jpg";
                    break;
                case IMAGETYPE_PNG:
                    $fileExtension = ".png";
                    break;
                case IMAGETYPE_GIF:
                    $fileExtension = ".gif";
                    break;
                case IMAGETYPE_BMP:
                    $fileExtension = ".bmp";
                    break;
                default:
                    unlink($destination);
                    return $imageType;
            }

            rename($destination, $destination . $fileExtension);

            $this->store($request->getFileName(), $filename, $fileExtension);
        }

        $response = Response::make('pass some success message to flow.js', 200);
        return $response;
    }

    private function validateImage($destination)
    {
        $imageType = exif_imagetype($destination);
        if (!$imageType) {
            return Response::make('This is not an image!', 400);
        } elseif ($imageType !== IMAGETYPE_JPEG &&
            $imageType !== IMAGETYPE_PNG &&
            $imageType !== IMAGETYPE_GIF &&
            $imageType !== IMAGETYPE_BMP
        ) {
            return Response::make('Only JPEG, PNG, GIF and BMP allowed.', 400);
        }else{
            return $imageType;
        }

    }
}
