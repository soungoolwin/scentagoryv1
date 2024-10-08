<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Decant;
use App\Models\Price;
use App\Models\Size;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create brands
        $brands = Brand::factory()->count(5)->create();

        // Create unique sizes
        $sizes = [];
        $sizes[] = Size::create(['size' => '5ml']);
        $sizes[] = Size::create(['size' => '3ml']);
        $sizes[] = Size::create(['size' => '10ml']);

        // Create decants and define prices
        foreach ($brands as $brand) {
            $decants = Decant::factory()->count(3)->create([
                'brand_id' => $brand->id,
            ]);

            foreach ($decants as $decant) {
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
