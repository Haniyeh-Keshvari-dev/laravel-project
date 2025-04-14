<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;


class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['samsung', 'Xiaomi', 'nokia', 'apple'];

        foreach ($brands as $brandName) {
            Brand::create([
                'name' => $brandName
            ]);
        }
    }
}
