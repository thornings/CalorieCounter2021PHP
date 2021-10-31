<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FoodWeightTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'weight' => $this->faker->randomNumber(300)+50,
             'weight_type_id' => $this->faker->randomNumber(3),
             'food_id' => $this->faker->randomNumber(5),
        ];
    }
}
