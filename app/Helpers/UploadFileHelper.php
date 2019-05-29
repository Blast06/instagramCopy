<?php
namespace App\Helpers;


use Intervention\Image\Facades\Image;

class UploadFileHelper {
    public static function uploadFile($key, $path){
        request()->file($key)->store($path);
        return request()->file($key)->hashName();
    }

    public static function uploadFile2($key,$path){
        $imagePath = request($key)->store($path, 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image->save();
        return $image;
    }
}