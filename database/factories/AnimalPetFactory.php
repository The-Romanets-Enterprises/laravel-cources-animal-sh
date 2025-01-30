<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enum\Sex;
use App\Models\Animal;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal_pet>
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
            'description' => fake()->text(),
            'character' => fake()->text(),
            'is_confirmed' => fake()->boolean(),
            'is_sterilized' => fake()->boolean(),
            'has_vaccination' => fake()->boolean(),
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'birth_date' => fake()->date(),
            'sex' => fake()->boolean(50) ? Sex::MALE : Sex::FEMALE,
            'wool_type' => fake()->randomElement(['гладкая', 'кудрявая', 'длинная', 'короткая', 'жетская', 'мягкая', 'шелковистая', 'отсутствует']),
        ];
    }
}
