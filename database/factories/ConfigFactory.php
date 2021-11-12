<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'welcome_text' => $this->faker->text(30),
            'slogan' => $this->faker->text(15),
            'about' => $this->faker->text(50)
        ];
    }
}
