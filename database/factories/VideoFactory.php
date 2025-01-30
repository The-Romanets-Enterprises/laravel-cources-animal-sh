<?php

namespace Database\Factories;

use App\Models\AnimalPet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => fake()->imageUrl(),
            'animal_pet_id' => AnimalPet::query()->inRandomOrder()->first()->id,
        ];
    }
}
