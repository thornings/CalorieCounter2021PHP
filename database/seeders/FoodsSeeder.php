<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Milk','Banana','Apple','Chicken','Carrots'];
        for ($i=0; $i < 5; $i++) {
            Food::create([
                'name' => $names[$i],
                'weight' => rand(50, 200),
                'energy' => rand(0,400),
                'carbs' => rand(0, 50),
                'proteins' => rand(0, 35),
                'fats' => rand(0, 35),
                'food_weight_type_id' => 1
            ]);
        }
    }
}
