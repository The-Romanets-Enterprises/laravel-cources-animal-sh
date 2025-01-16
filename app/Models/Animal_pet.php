<?php

namespace App\Models;

use App\Enums\Sex;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal_pet extends Model
{
    /** @use HasFactory<\Database\Factories\AnimalPetFactory> */
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'sex',
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
            'birth_date' => 'datetime',
            'is_sterilized' => 'boolean',
            'has_vaccination' => 'boolean',
            'is_confirmed' => 'boolean',
            'user_id' => 'integer',
        ];
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function animal(){
        return $this->belongsTo(Animal::class);
    }
}
