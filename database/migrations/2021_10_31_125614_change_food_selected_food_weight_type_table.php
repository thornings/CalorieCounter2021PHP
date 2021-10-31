<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFoodSelectedFoodWeightTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('foods', function (Blueprint $table) {
             $table->bigInteger('food_weight_type_id');
            // $table->foreign('food_weight_type_id')->references('id')->on('food_weight_type');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foods', function (Blueprint $table) {
           // $table->dropForeign('foods_food_weight_type_id_foreign');
            $table->dropColumn('food_weight_type_id');
        });
    }
}
