<?php

namespace Database\Factories;

use App\Models\FoodItem;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodItem>
 */
class FoodItemFactory extends Factory
{
    protected $model = FoodItem::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_id' => Restaurant::factory(),
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 30),
            'category' => $this->faker->randomElement(['Burgers', 'Pizzas', 'Salads', 'Desserts', 'Drinks']),
            'is_available' => $this->faker->boolean(80), // 80% chance of being available
        ];
    }
}
