<?php

namespace Database\Factories;

use App\Models\Animal_pet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageableType = fake()->randomElement([Animal_pet::class, User::class]);
        $imageable = $imageableType::query()->inRandomOrder()->first();

        return [
            'imageable_id' => optional($imageable)->id,
            'path' => fake()->imageUrl(),
            'imageable_type' => $imageableType,
        ];
    }
}
