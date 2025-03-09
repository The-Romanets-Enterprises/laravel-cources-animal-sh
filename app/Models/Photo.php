<?php

namespace App\Models;

use App\Http\Requests\PhotoRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Traits\MediaTrait;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    /** @use HasFactory<\Database\Factories\PhotoFactory> */
    use HasFactory, MediaTrait;

    protected $fillable = [
        'path',
        'imageable_type',
        'imageable_id',
    ];

    protected function casts(): array
    {
        return [
            'imageable_id' => 'integer',
        ];
    }

    public function imageable()
    {
        return $this->morphTo();
    }

    public static function createPhoto(PhotoRequest $request)
    {
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photoFile) {
                $path = $photoFile->store('photos', 'public');
                self::query()->create([
                    'path' => $path,
                    'imageable_id' => $request->input('imageable_id'),
                    'imageable_type' => $request->input('imageable_type'),
                ]);
            }
        }

        return true;
    }

    public static function updatePhoto(PhotoRequest $request, self $photo)
    {
        $data = $request->validated();

        return $photo->update($data);
    }

    public static function deletePhoto(self $photo)
    {
        if ($photo->path)
        {
            Storage::delete($photo->path);
        }
        return $photo->delete();

    }

    public static function uploadPhoto(Request $request, $image = null)
    {
        return self::uploadMedia(
            key: 'path',
            path: 'animals_and_users',
            request: $request,
            image: $image,
        );
    }

    public function getPhoto()
    {
        return self::getMedia('path');
    }
}
