<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
//        \App\Models\User::truncate();
        $faker = \Faker\Factory::create();
        $password = bcrypt('secret');
        \App\Models\User::create([
            'name' => $faker->unique()->userName,
            'email' => 'graphql@test.com',
            'password' => $password,
        ]);
        for ($i = 0; $i < 100; ++$i) {
            \App\Models\User::create([
                'name' => $faker->unique()->userName,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
