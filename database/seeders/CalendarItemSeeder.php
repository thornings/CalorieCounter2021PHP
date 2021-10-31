<?php

namespace Database\Seeders;

use App\Models\CalendarItem;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CalendarItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CalendarItem::create([
             'weight' => rand(100),
             'pieces' => 1,
             'calendar_date' => Carbon::now(),
             'meal_id' => 1,
             'user_id' => 1,
             'selected_food_weight_type_id' => rand(9)
        ]);

        CalendarItem::create([
             'weight' => rand(100),
             'pieces' => 1,
             'calendar_date' => Carbon::now(),
             'meal_id' => 2,
             'user_id' => 1,
            'selected_food_weight_type_id' => rand(9)
        ]);
    }
}
