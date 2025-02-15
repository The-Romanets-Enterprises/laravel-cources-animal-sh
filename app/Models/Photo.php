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

    public function animal_pet()
    {
        return $this->belongsTo(Animal_pet::class);
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
