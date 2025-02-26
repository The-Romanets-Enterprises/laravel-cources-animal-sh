<?php

namespace App\Models;

use App\Http\Requests\CityRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'country_id' => 'integer',
        ];
    }

    public function __toString()
    {
        return $this->name ?? '';
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public static function createCity(CityRequest $request)
    {
        $data = $request->validated();

        return self::query()->create($data);
    }

    public static function updateCity(CityRequest $request, self $city)
    {
        $data = $request->validated();

        return $city->update($data);
    }

    public static function deleteCity(self $city)
    {
        return $city->delete();
    }
}
