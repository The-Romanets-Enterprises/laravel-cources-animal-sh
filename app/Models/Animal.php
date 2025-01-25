<?php

namespace App\Models;

use App\Http\Requests\AnimalRequest;
use App\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Animal extends Model
{
    /** @use HasFactory<\Database\Factories\AnimalFactory> */
    use HasFactory, MediaTrait;

    protected $fillable = ['name', 'photo'];

//    public function cities()
//    {
//        return $this->hasMany(City::class);
//    }

    public static function getAnimals()
    {
        return self::query()->orderBy('name')->get();
    }

    public static function createAnimal(AnimalRequest $request)
    {
        $data = $request->validated();
        $data['photo'] = self::uploadPhoto($request);

        return self::query()->create($data);
    }

    public static function updateAnimal(AnimalRequest $request, self $animal)
    {
        $data = $request->validated();
        $data['photo'] = self::uploadPhoto($request, $animal->photo);

        return $animal->update($data);
    }

    public static function deleteAnimal(self $animal)
    {
        if ($animal->photo) {
            Storage::delete($animal->photo);
        }

        return $animal->delete();
    }

    public static function uploadPhoto(Request $request, $image = null)
    {
        return self::uploadMedia(
            key: 'logo',
            path: 'animals',
            request: $request,
            image: $image,
        );
    }

    public function getPhoto()
    {
        return self::getMedia('photo');
    }

    public function __toString()
    {
        return $this->name;
    }
}
