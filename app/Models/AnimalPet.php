<?php

namespace App\Models;

use App\Enums\Sex;
use Carbon\Carbon;
use App\Http\Requests\AnimalPetRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class AnimalPet extends Model
{
    /** @use HasFactory<\Database\Factories\AnimalPetFactory> */
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'sex',
        'name',
        'description',
        'birth_date',
        'is_sterilized',
        'has_vaccination',
        'wool_type',
        'character',
        'is_confirmed',
        'user_id',
    ];

    protected function casts()
    {
        return [
            'animal_id' => 'integer',
            'sex' => Sex::class,
            'name' => 'string',
            'birth_date' => 'date',
            'is_sterilized' => 'boolean',
            'has_vaccination' => 'boolean',
            'is_confirmed' => 'boolean',
            'user_id' => 'integer',
        ];
    }

    public function photos() : MorphMany
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public static function createAnimalPet(AnimalPetRequest $request)
    {
        $data = $request->validated();

        return self::query()->create($data);
    }

    public static function updateAnimalPet(AnimalPetRequest $request, self $animal_pet)
    {
        $data = $request->validated();

        return $animal_pet->update($data);
    }

    public static function deleteAnimalPet(self $animal_pet)
    {
        return $animal_pet->delete();
    }
}
