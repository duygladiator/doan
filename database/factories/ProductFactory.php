<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        $name = $this->faker->name();
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'price' => $this->faker->numberBetween(10000, 100000),
            'discount_price' => $this->faker->numberBetween(10000, 100000),
            'short_description' => $this->faker->text(),
            'description' => $this->faker->paragraph(),
            // 'image_url' => '',
            'slug' => $slug,
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}