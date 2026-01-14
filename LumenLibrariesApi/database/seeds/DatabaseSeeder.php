<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Library;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 8; $i++) {
            Library::create([
                'name' => $faker->company . ' Library',
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'email' => $faker->companyEmail,
            ]);
        }
    }
}
