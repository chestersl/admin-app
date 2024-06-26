<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1,30) as $index) {
            Company::create([
                'name' => $faker->company,
                'email' => $faker->email,
                'website' => $faker->url,
            ]);
        }
    }
}
