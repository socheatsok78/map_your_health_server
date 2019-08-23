<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

trait UsePhotoStorage
{
    /**
     * Save photo to storeage
     *
     * @return void
     */
    public static function saveToStorage($content)
    {
        $filePath = "public/photos";

        $saved = Storage::put($filePath, $content, "public");

        $url = Storage::url($saved);

        return $url;
    }

    /**
     * Boot UsePhotoStorage Trait
     *
     * @return void
     */
    public static function bootUsePhotoStorage()
    {
        // Listen for Creating Event
        static::creating(function ($model) {
            if ($model->photo instanceof UploadedFile) {
                $model->photo = static::saveToStorage($model->photo);
            }
        });
    }
}
