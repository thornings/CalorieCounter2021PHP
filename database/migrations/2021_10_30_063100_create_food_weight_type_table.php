<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodWeightTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_weight_type', function (Blueprint $table) {
            $table->id();
            $table->integer('weight');

            $table->integer('food_id');
            $table->integer('weight_type_id');
            $table->unique(['food_id', 'weight_type_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_weight_types');
    }
}
