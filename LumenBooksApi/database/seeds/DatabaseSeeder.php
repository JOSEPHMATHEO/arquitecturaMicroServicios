<?php

use App\Book;
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
        for ($i = 0; $i < 150; $i++) {
            Book::create([
                'title' => $faker->sentence(3,true),
                'description' => $faker->sentence(6,true),
                'price' => $faker->numberBetween(25,150),
                'author_id' => $faker->numberBetween(1,50),
            ]);
        }
    }
}
