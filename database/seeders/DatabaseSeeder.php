<?php

namespace Database\Seeders;

use App\Enum\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'SuperUser',
//            'email' => 'root@gmail.com',
//            'password' => bcrypt('123456'),
//            'role' => Role::ADMIN,
//        ]);
//
//        User::factory(11)->create();

//        $this->call(CountrySeeder::class);
//        $this->call(CitySeeder::class);
//        $this->call(AddressSeeder::class);
//        $this->call(AnimalSeeder::class);
    }
}
