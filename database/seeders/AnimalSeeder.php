<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Собака', 'Кошка', 'Попугай', 'Хомяк', 'Черепаха', 'Кролик', 'Мышь', 'Крыса'];

        foreach ($categories as $category) {
            Animal::firstOrCreate(['name' => $category]);
        }
    }
}
