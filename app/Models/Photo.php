<?php

namespace App\Models;

use App\Http\Requests\PhotoRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    /** @use HasFactory<\Database\Factories\PhotoFactory> */
    use HasFactory;

    protected $fillable = [
        'path',
        'imageable_id',
        'imageable_type',
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

    public static function createPhoto($data)
    {
        $files = $data['photo'] ?? $data['photos'] ?? null;

        if ($files) {
            if (!is_array($files)) {
                $files = [$files];
            }

            foreach ($files as $photoFile) {
                $path = $photoFile->store('photos', 'public');
                self::create([
                    'path' => $path,
                    'imageable_id' => $data['imageable_id'],
                    'imageable_type' => $data['imageable_type'],
                ]);
            }
        }
    }


    public static function updatePhoto(PhotoRequest $request, self $photo)
    {
        $data = $request->validated();

        return $photo->update($data);
    }

    public static function deletePhoto(self $photo)
    {
        return $photo->delete();
    }

    public static function deleteFileFromStorage(string $path): void
    {
        Storage::disk('public')->delete($path);
    }
}
