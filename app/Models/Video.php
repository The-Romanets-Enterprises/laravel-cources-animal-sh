<?php

namespace App\Models;

use App\Http\Requests\VideoRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Laravel\Prompts\select;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory, MediaTrait;

    protected $fillable = [
        'path',
        'animal_pet_id',
    ];

    protected function casts()
    {
        return [
            'animal_pet_id' => 'integer',
            'path' => 'string',
        ];
    }

    public function animalPet()
    {
        return $this->belongsTo(AnimalPet::class);
    }

    public static function createVideo(VideoRequest $request)
    {
        $data = $request->validated();

        $data['path'] = self::uploadVideo($request);
        return self::query()->create($data);
    }

    public static function createFromPath(string $path, int $animalPetId)
    {
        return self::query()->create([
            'path' => $path,
            'animal_pet_id' => $animalPetId,
        ]);
    }

    public static function updateVideo(VideoRequest $request, self $video)
    {
        $data = $request->validated();

        if ($request->hasFile('path'))
        {
            $data['path'] = self::uploadVideo($request, $video->path);
        }
        return $video->update($data);
    }

    public static function deleteVideo(self $video)
    {
        if ($video->path)
        {
            Storage::delete($video->path);
        }
        return $video->delete();
    }

    public static function uploadVideo(Request $request, $video = null)
    {
        return self::uploadMedia(
            key: 'path',
            path: 'animal_pets',
            request: $request,
            image: $video
        );
    }

    public function getVideo()
    {
        return self::getMedia('path');
    }
}
