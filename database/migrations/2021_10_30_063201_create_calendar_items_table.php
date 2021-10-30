<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_items', function (Blueprint $table) {
            $table->id();

            $table->dateTime('calendar_date');
            $table->decimal('weight');
            $table->integer('pieces');

            $table->bigInteger('meal_id')->unsigned();
            $table->foreign('meal_id')->references('id')->on('meals');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->bigInteger('selected_food_weight_type_id')->unsigned();
            $table->foreign('selected_food_weight_type_id')->references('id')->on('food_weight_type');

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
        Schema::dropIfExists('calendar_items');
    }
}
