<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'manufactured_at' => $this->faker->date(),
            'purchased_at' => $this->faker->date(),
            'minimum_expiry_date' => $this->faker->date(),
            'expiry_date' => $this->faker->date(),
            'photo' => $this->faker->imageUrl(),
        ];
    }
}
