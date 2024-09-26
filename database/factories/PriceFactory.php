<?php

namespace Database\Factories;

use App\Models\Decant;
use App\Models\Price;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Price::class;

    public function definition()
    {
        return [
            'decant_id' => Decant::factory(), // Will be created in the seeder
            'size_id' => Size::factory(), // Will be created in the seeder
            'price' => $this->faker->randomFloat(2, 1000, 5000), // Will be set in the seeder
        ];
    }
}
