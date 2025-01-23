<?php

namespace App\Models;

use App\Enums\Sex;
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
            'birth_date' => Carbon::class,
            'is_sterilized' => 'boolean',
            'has_vaccination' => 'boolean',
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
}
