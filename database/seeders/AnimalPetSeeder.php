<?php

namespace Database\Seeders;

use App\Models\AnimalPet;
use Illuminate\Database\Seeder;

class AnimalPetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnimalPet::factory(100)->create();
    }
}
