<?php

namespace Database\Seeders;

use App\Models\FoundDog;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class FoundDogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 9) as $index) {
            FoundDog::create([
                'user_id' => $faker->randomDigit(1,9),
                'name' => $faker->name,
                'color' => $faker->colorName,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'breed' => $faker->word,
                'description' => $faker->text,
                'longitude' => $faker->longitude,
                'latitude' => $faker->latitude,
                'address' => $faker->address(),
                'images' => 'assets/app/images/lost-dog-list' . sprintf('%02d', $index) . '.jpg',
                'status' => $faker->numberBetween(0,1),
                'missing_status' => $faker->randomElement(['found', 'Rescued']),
            ]);
        }
    }
}
