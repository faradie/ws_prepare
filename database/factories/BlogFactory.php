<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(30);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->text(100),
            'created_by' => rand(1,200),
        ];
    }
}
