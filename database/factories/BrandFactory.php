<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Brand>
 */
class BrandFactory extends Factory
{
    public function definition(): array
    {
        $brands = [
            'Cocacola',
            'Pepsico',
            'Number1',
            'Nutri',
            'Fanta',
        ];

        return [
            'name' => fake()->unique()->randomElement($brands),
        ];
    }
}
