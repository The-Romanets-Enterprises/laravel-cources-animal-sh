<?php

namespace App\Models;

use App\Http\Requests\PhotoRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\MediaTrait;

class Photo extends Model
{
    /** @use HasFactory<\Database\Factories\PhotoFactory> */
    use HasFactory, MediaTrait;

    protected $fillable = [
      'path',
      'imageable_id',
      'imageable_type',
    ];

    protected function casts()
    {
        return [
            'imageable_id' => 'integer',
        ];
    }

    public function imageable() : MorphTo
    {
        return $this->morphTo(null, 'imageable_type', 'imageable_id');
    }

    public static function createPhoto(PhotoRequest $request)
    {
        $data = $request->validated();
        $data['path'] = self::uploadPhoto($request);

        return self::query()->create($data);
    }

    public static function createFromPath(string $path, int $imageableId, string $imageableType)
    {
        return self::query()->create([
            'path' => $path,
            'imageable_id' => $imageableId,
            'imageable_type' => $imageableType,
        ]);
    }

    public static function updatePhoto(PhotoRequest $request, self $photo)
    {
        $data = $request->validated();

        if ($request->hasFile('path'))
        {
            $data['path'] = self::uploadPhoto($request, $photo->path);
        }

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
