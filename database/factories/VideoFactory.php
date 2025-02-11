<?php

namespace Database\Factories;

use App\Models\Animal_pet;
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
            'path' => $this->faker->imageUrl(),
            'animal_pet_id' => Animal_pet::query()->inRandomOrder()->first()->id ?? null,
        ];
    }
}
