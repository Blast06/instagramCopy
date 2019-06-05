<?php
namespace App\Helpers;


use Intervention\Image\Facades\Image;

class UploadFileHelper {

    //Helper para subir imagen

    //basicamente se basa en indicar el campo que contiene la imagen en el form($fieldname)
    //indicar como se llamara el folder en el cual se guardara dicha imagen($folderName)
    // despues indicar el ancho y alto de dicha imagen a la que se le hara fit()
    public static function uploadFile($fieldName, $folderName, $width, $height){

        $imagePath = request($fieldName)->store($folderName, 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit($width,$height);
        $image->save();

        $image = $imagePath;

        return $image;
    }


}