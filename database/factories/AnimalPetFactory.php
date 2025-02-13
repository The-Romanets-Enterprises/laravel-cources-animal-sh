<?php

namespace Database\Factories;

use App\Enums\Sex;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\AnimalPet>
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
            'sex' => fake()->randomElement(Sex::getValues()->all()),
            'name' => fake()->firstName(),
            'description' => fake()->text(),
            'birth_date' => fake()->date(),
            'wool_type' => fake()->randomElement(['гладкая', 'пушистая', 'блестящая', 'короткая', 'длинная']),
            'character' => fake()->text(),
            'user_id' => User::query()->inRandomOrder()->first()->id,
            'is_sterilized' => fake()->boolean(),
            'has_vaccination' => fake()->boolean(),
            'is_confirmed' => fake()->boolean(),

        ];
    }
}
