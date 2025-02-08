<?php

namespace App\Models;

use App\Http\Requests\VideoRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;

    protected $fillable = [
        'path',
        'animal_pet_id',
    ];

    protected function casts(): array
    {
        return [
            'animal_pet_id' => 'integer',
        ];
    }

    public function animalPet()
    {
        return $this->belongsTo(AnimalPet::class);
    }

    public static function createVideo(VideoRequest $request)
    {
        $data = $request->validated();

        return self::query()->create($data);
    }

    public static function updateVideo(VideoRequest $request, self $video)
    {
        $data = $request->validated();

        return $video->update($data);
    }

    public static function deleteVideo(self $video)
    {
        return $video->delete();

    }
}
