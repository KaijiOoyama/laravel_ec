<?php
    namespace App\Services;
    use Illuminate\Support\Facades\Storage;
    use InterventionImage;

    class ImageService {
        public static function upload($imageFile, $folderName) {
            if(is_array($imageFile)) $imageFile = $imageFile['image'];
            $filename = uniqid(rand() . '_') . '.' . $imageFile->extension();
            $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();
            Storage::put('public/' . $folderName . '/' . $filename, $resizedImage);
            return $filename;
        }
    }
