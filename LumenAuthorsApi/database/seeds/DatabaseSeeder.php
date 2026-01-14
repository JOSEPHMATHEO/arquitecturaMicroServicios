<?php

use App\Author;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        for ($i = 0; $i < 50; $i++) {
            Author::create([
                'gender' => $gender = $faker->randomElement(['male','female']),
                'name' => $faker->name($gender),
                'country' => $faker->country,
            ]);
        }
    }
}
