<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::getRegularUsers();

        /** @var User $user */
        foreach ($users as $user) {
            if ($user->address()->exists()) {
                Address::factory()->create([
                    'user_id' => $user->id
                ]);
            }
        }
    }
}
