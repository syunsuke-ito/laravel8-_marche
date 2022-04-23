<?php declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use InterventionImage;

/**
 * @copyright 2022 ito
 *
 * ecサイト:画像保存処理 service
 *
 * @create 2022/04 ecサイト
 * [更新履歴]
 *
 */
class ImageService
{

    /**
     *
     * @param Illuminate\Http\UploadedFile $imageFile
     * @param string $folderName
     *
     * @return string $fileNameToStore
     */
    public static function upload($imageFile, $folderName)
    {
        $fileName = uniqid(rand() . '_');
        $extension = $imageFile->extension();
        $fileNameToStore = $fileName . '.' . $extension;
        $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();
        Storage::put('public/' . $folderName . '/' . $fileNameToStore, $resizedImage);

        return $fileNameToStore;
    }
}