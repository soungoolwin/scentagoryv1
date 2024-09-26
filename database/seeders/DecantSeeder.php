<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Decant;
use App\Models\Price;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DecantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = Brand::factory()->count(5)->create();

        // Create sizes
        $sizes = Size::factory()->count(5)->create();

        // Create decants and associate them with random brands and sizes
        foreach ($brands as $brand) {
            $decants = Decant::factory()->count(3)->create([
                'brand_id' => $brand->id,
            ]);

            foreach ($decants as $decant) {
                // Assign random sizes and prices to each decant
                foreach ($sizes as $size) {
                    Price::create([
                        'decant_id' => $decant->id,
                        'size_id' => $size->id,
                        'price' => rand(1000, 5000), // Random price for example
                    ]);
                }
            }
        }
    }
}
