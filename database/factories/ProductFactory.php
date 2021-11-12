<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(30),
            'description' => $this->faker->text(60),
            'price' => $this->faker->randomDigit,
            'image' => $this->faker->imageUrl($width = 200, $height = 200),
        ];
    }
}
