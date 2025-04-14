<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = ['blue', 'green', '60GB', '50px', 'Android 13', 'ios'];

        foreach ($features as $feature) {
            Feature::create([
                'name' => $feature,
            ]);
        }
    }
}
