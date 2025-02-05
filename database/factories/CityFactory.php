<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $countryId = Country::query()->inRandomOrder()->first()->id;

        $cityName = fake()->city();

        while (City::where('name', $cityName)->where('country_id', $countryId)->exists()) {
            $cityName = fake()->city();
        }

        return [
            'name' => $cityName,
            'country_id' => $countryId,
        ];
    }
}
