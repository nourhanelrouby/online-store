<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'image'=> $this->faker->imageUrl(),
            'price' => $this->faker->randomFloat(2, 2000, 10000),
            'offer' => $this->faker->randomElement([0, 1]),
            'new_price' => $this->faker->randomFloat(2,1000, 5000),
            'status' => $this->faker->boolean(),
            'quantity' => $this->faker->randomDigit(),
            'category_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
