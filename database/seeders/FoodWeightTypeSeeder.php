<?php

namespace Database\Seeders;

use App\Models\FoodWeightType;
use Illuminate\Database\Seeder;

class FoodWeightTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // extra foodweightype on food
        for ($foodid=1; $foodid < 6; $foodid++) {
            // default gram = 1 on every food
            FoodWeightType::create([
                'weight' => 1,
                'food_id' => $foodid,
                'weight_type_id' => 1,
            ]);

            FoodWeightType::create([
                'weight' => rand(30, 250),
                'food_id' => $foodid,
                'weight_type_id' => rand(2,4),
            ]);
        }

    }
}
