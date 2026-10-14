<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {

            Booking::create([
                'customer_id' => fake()->numberBetween(1, 30),
                'service_id' => fake()->numberBetween(1, 5),
                'mechanic_id' => fake()->numberBetween(1, 5),
                'vehicle_name' => fake()->company(),
                'vehicle_number' => strtoupper(fake()->bothify('GJ##??####')),
                'booking_date' => fake()->date(),
                'booking_time' => fake()->time(),
                'amount' => fake()->numberBetween(500, 5000),
                'booking_status' => fake()->randomElement(['Pending', 'Confirmed', 'Completed']),
                'payment_status' => fake()->randomElement(['Pending', 'Paid']),
                'notes' => fake()->paragraph(),
            ]);

        }
    }
}