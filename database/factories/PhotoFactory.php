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
        // Случайно выбираем модель для связи
        $imageableType = $this->faker->randomElement([User::class, AnimalPet::class]);

        // Получаем случайную запись из выбранной модели
        $imageable = $imageableType::query()->inRandomOrder()->first();

        return [
            'path' => $this->faker->imageUrl(),
            'imageable_id' => $imageable ? $imageable->id : null,
            'imageable_type' => $imageableType,
        ];
    }
}
