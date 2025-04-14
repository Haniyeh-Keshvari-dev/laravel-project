<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Feature;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = Brand::all();

        foreach ($brands as $brand) {
            for ($i = 1; $i <= 5; $i++) {

                $product = Product::create([
                    'name' => "product $i for {$brand->name}",
                    'price' => rand(1000000, 10000000),
                    'brand_id' => $brand->id,
                ]);

                $features = Feature::inRandomOrder()->take(2)->pluck('id');

                $product->features()->attach($features);
            }
        }
    }
}
