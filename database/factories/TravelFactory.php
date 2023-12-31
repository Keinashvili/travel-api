<?php

namespace Database\Factories;

use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Travel>
 */
class TravelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->text(20),
            'is_public' => fake()->boolean(47),
            'description' => fake()->text(100),
            'number_of_days' => rand(1, 10),
        ];
    }
}
