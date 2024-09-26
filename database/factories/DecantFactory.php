<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Decant;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Decant>
 */
class DecantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Decant::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'scent_accords' => $this->faker->text,
            'top_note' => $this->faker->word,
            'base_note' => $this->faker->word,
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Unisex']),
            'brand_category' => $this->faker->word,
            'country' => $this->faker->country,
            'brand_id' => Brand::factory(), // Associate with a brand
            'image' => 'path/to/image.jpg', // Set a default image path
        ];
    }
}
