<?php

namespace App\Models;

use App\Http\Requests\PhotoRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public static function createPhoto(PhotoRequest $request)
    {
        $data = $request->validated();

        return self::query()->create($data);
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
}
