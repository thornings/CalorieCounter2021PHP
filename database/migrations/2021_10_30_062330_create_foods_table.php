<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('weight');
            $table->decimal('carbs');
            $table->decimal('proteins');
            $table->decimal('fats');
            $table->decimal('energy');

            // $table->bigInteger('selected_food_weight_type_id');
            // $table->foreign('selected_food_weight_type_id')->references('id')->on('food_weight_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food');
    }
}
