<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Enum\Sex;


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
}
