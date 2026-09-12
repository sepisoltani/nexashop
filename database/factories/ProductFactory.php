<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
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
        $name = $this->faker->words(3, true);

        return [
            'name' => $name,
            'slug' => Str::slug($name).'-'.$this->faker->unique()->numberBetween(1, 100000),
            'short_description' => $this->faker->sentence(8),
            'description' => $this->faker->paragraphs(3, true),
            'price' => $this->faker->numberBetween(200, 15000) * 1000,
            'image' => 'images/products/nova-x-headphones.jpg',
            'category' => $this->faker->randomElement(['هدفون', 'کیبورد', 'ماوس', 'لوازم جانبی']),
            'stock' => $this->faker->numberBetween(0, 50),
            'is_featured' => $this->faker->boolean(20),
        ];
    }
}
