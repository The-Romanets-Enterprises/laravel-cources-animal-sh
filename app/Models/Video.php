<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\VideoRequest;

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
    public function animal_pet()
    {
        return $this->belongsTo(Animal_pet::class);
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
