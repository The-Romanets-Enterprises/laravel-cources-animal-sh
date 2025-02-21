<?php

namespace App\Models;

use App\Enums\Sex;
use App\Http\Requests\AnimalPetRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalPet extends Model
{
    /** @use HasFactory<\Database\Factories\AnimalPetFactory> */
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'sex',
        'name',
        'description',
        'is_confirmed',
        'user_id',
        'birth_date',
        'is_sterilized',
        'has_vaccination',
        'wool_type',
        'character',
    ];

    protected function casts(): array
    {
        return [
            'animal_id' => 'integer',
            'sex' => Sex::class,
            'is_confirmed' => 'boolean',
            'user_id' => 'integer',
            'birth_date' => 'date:Y-m-d',
            'is_sterilized' => 'boolean',
            'has_vaccination' => 'boolean',
        ];
    }

    public function __toString()
    {
        return $this->name ?? '';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public static function createAnimalPet(AnimalPetRequest $request, User $user)
    {
        $data = $request->validated();

        return $user->animalPets()->create($data);
    }

    public static function updateAnimalPet(AnimalPetRequest $request, self $animalPet)
    {
        $data = $request->validated();
        $animalPet->update($data);

        return $animalPet;
    }

    public static function deleteAnimalPet(self $animalPet)
    {
        return $animalPet->delete();
    }
}
