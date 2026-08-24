<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Restaurant;
use App\Models\FoodItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed 2 Users: admin and customer
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
            'role' => 'customer',
            'password' => bcrypt('password'),
        ]);

        // Seed 3 Restaurants
        $restaurants = Restaurant::factory(3)->create();

        // Seed 10 Menu Items (FoodItems) distributed among restaurants under 2 categories
        $categories = ['Main Course', 'Desserts'];
        foreach ($restaurants as $index => $restaurant) {
            $count = ($index === 2) ? 4 : 3; // 3 + 3 + 4 = 10 items
            FoodItem::factory($count)->create([
                'restaurant_id' => $restaurant->id,
                'category' => $categories[$index % 2],
            ]);
        }
    }
}
