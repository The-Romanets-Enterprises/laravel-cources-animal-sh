<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /** @use HasFactory<\Database\Factories\PhotoFactory> */
    use HasFactory;

    protected $fillable = [
        'path',
        'imageable_type',
        'imageable_id',
    ];

    protected function casts(): array
    {
        return [
            'imageable_id' => 'integer',
        ];
    }
}
