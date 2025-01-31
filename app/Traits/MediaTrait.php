<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait MediaTrait
{
    public static function uploadMedia($key, $path, Request $request, $image = null)
    {
        if ($request->hasFile($key)) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file($key)->store("{$path}/{$folder}");
        }
        return $image;
    }

    public static function uploadMediaFile($path, UploadedFile $file, $image = null)
    {
        if ($image) {
            Storage::delete($image);
        }
        $folder = date('Y-m-d');
        return $file->store("{$path}/{$folder}");
    }

    public function getMedia($key)
    {
        if (!$this->$key) {
            return null;
        }

        if (str_contains($this->$key, 'http') || str_contains($this->$key, 'https')) {
            return asset($this->$key);
        }

        return asset("storage/{$this->$key}");
    }
}
