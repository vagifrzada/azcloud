<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Entities\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();

        User::create([
            'name' => 'AzCloud',
            'email' => 'root@azcloud.az',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => true,
        ]);

        for ($i = 0; $i < 9; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status' => true,
            ]);
        }
    }
}
