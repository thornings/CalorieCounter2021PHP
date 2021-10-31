<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Meal::create([
            'name' => 'BreakFast'
        ]);
        Meal::create([
            'name' => 'Lunch'
        ]);
        Meal::create([
            'name' => 'Dinner'
        ]);
        Meal::create([
            'name' => 'Snacks'
        ]);

    }
}
