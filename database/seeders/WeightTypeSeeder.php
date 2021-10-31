<?php

namespace Database\Seeders;

use App\Models\WeightType;
use Illuminate\Database\Seeder;

class WeightTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WeightType::Create([
            'name' => 'Gram',
        ]);

        WeightType::Create([
            'name' => 'Piece',
        ]);

        WeightType::Create([
            'name' => 'Small',
        ]);

        WeightType::Create([
            'name' => 'Big',
        ]);

    }
}
