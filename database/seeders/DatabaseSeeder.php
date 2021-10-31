<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(MealSeeder::class);
         $this->call(WeightTypeSeeder::class);
         $this->call(FoodsSeeder::class);
         $this->call(FoodWeightTypeSeeder::class);
    }
}
