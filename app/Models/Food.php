<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    /**
     * Changeable fields
     */
    protected $fillable = [
        'name', 'weight', 'energy', 'carbs', 'proteins', 'fats', 'selectedFoodWeightType'
    ];

    /**
     * Get the selected FoodWeightType
     */
    public function selectedFoodWeightType()
    {
        return $this->belongsTo(FoodWeightType::class);
    }

     /**
     * Get the FoodWeightTypes for this Food.
     */
    public function WeightTypes()
    {
        return $this->hasManyThrough(
            // required
            'App\Models\WeightType',
            'App\Models\FoodWeightType',

            // optional
            'weight_type_id', // the current model id in the pivot
            'id', // the id of related model
            'id', // the id of current model
            'food_id' // the related model id in the pivot
        );

        return $this->belongsToMany(FoodWeightType::class)->withPivot('weight');
    }


}
