<?php

namespace Database\Factories;

use App\Enums\Sex;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnimalPet>
 */
class AnimalPetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'animal_id' => Animal::query()->inRandomOrder()->first()->id,
            'sex' => fake()->boolean(50) ? Sex::MALE : Sex::FEMALE,
            'description' => fake()->text(),
            'is_confirmed' => fake()->boolean(),
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'birth_date' => fake()->date(),
            'is_sterilized' => fake()->boolean(),
            'has_vaccination' => fake()->boolean(),
            'wool_type' => fake()->randomElement(['гладкая', 'длинная', 'короткая', 'кудрявая', 'жетская', 'шелковистая', 'отсутствует']),
            'character' => fake()->text(),
        ];
    }
}
