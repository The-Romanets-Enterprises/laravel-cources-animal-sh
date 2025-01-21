<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Photo extends Model
{
    /** @use HasFactory<\Database\Factories\PhotoFactory> */
    use HasFactory;

    protected $fillable = [
      'path',
    ];

    protected function casts()
    {
        return [
            'imageable_id' => 'integer',
        ];
    }

    public function imageable() : MorphTo
    {
        return $this->morphTo();
    }
}
