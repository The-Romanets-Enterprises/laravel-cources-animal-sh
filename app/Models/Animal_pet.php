<?php

namespace App\Models;

use App\Enum\Sex;
use App\Http\Requests\Animal_PetRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Animal_pet extends Model
{
    /** @use HasFactory<\Database\Factories\AnimalPetFactory> */
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'user_id',
        'sex',
        'description',
        'birth_date',
        'has_vaccination',
        'wool_type',
        'character',
        'is_sterilized',
        'is_confirmed'
    ];

    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
            'is_confirmed' => 'boolean',
            'animal_id' => 'integer',
            'birth_date' => Carbon::class,
            'sex' => Sex::class,
            'has_vaccination' => 'boolean',
            'is_sterilized' => 'boolean',
        ];
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

    public static function createAnimal_pet(Animal_PetRequest $request, User $user)
    {
        $data = $request->validated();
        $data['user_id'] = $user->id;

        return self::query()->create($data);
    }

    public static function updateAnimal_pet(Animal_PetRequest $request, self $animal_pet)
    {
        $data = $request->validated();

        return $animal_pet->update($data);
    }

    public static function deleteAnimal_pet(self $animal_pet)
    {
        return $animal_pet->delete();
    }
}
