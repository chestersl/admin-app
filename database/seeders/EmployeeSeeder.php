<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('uk_UA');
        $companyCount = Company::all()->count();

        foreach (range(1, 100) as $index) {
            Employee::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber(),
                'company_id' => $faker->numberBetween(1, $companyCount),
            ]);
        }
    }
}
