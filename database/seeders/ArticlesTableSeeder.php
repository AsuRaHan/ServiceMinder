<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        \App\Models\Article::truncate();
        \App\Models\Article::unguard();
        $faker = \Faker\Factory::create();
        \App\Models\User::all()->each(function ($user) use ($faker) {
            foreach (range(1, 15) as $i) {
                \App\Models\Article::create([
                    'user_id' => $user->id,
                    'title' => $faker->sentence . ' num ' .$i,
                    'content' => $faker->paragraphs(6, true),
                    'preview' => $faker->paragraph,
                    'description' => $faker->text,
                    'thumbnail' => $faker->imageUrl,
                ]);
            }
        });
    }
}
