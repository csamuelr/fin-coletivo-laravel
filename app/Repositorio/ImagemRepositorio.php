<?php

namespace App\Repositorio;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImagemRepositorio
    {
        public function saveImage($image, $id)
        {
            if (!is_null($image))
            {
                $file = $image;
                $extension = $image->getClientOriginalExtension();
                $fileName = time() . random_int(100, 999) .'.' . $extension; 
                $destinationPath = public_path('images/'.$id.'/');
                $url = 'http://financiamento-coletivo.herokuapp.com/images/'.$id.'/'.$fileName;
                $fullPath = $destinationPath.$fileName;
                if (!file_exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0775);
                }
                $image = Image::make($file)
                    ->resize(250, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->encode('jpg');
                $image->save($fullPath, 100);
                return $url;
            } else {
                return 'http://financiamento-coletivo.herokuapp.com/images/placeholder300x300.jpg';
            }
        }
    }