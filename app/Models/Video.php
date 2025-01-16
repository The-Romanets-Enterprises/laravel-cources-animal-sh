<?php

namespace App\Models;

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

    protected function casts()
    {
        return [
            'animal_pet_id' => 'integer',
        ];
    }

    public function animalPet()
    {
        return $this->belongsTo(Animal_pet::class);
    }
}
