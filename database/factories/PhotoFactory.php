<?php

namespace Database\Factories;

use App\Models\AnimalPet;
use App\Models\User;
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
        $imageableType = fake()->randomElement([AnimalPet::class, User::class]);
        $imageable = $imageableType::query()->inRandomOrder()->first();

        return [
            'path' => fake()->imageUrl(),
            'imageable_id' => optional($imageable)->id,
            'imageable_type' => $imageableType,
        ];
    }
}
