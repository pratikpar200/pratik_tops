<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {

            Customer::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'password' => Hash::make('123456'),
                'status' => 'Active',
            ]);

        }
    }
}