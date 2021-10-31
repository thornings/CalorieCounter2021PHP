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
        'name', 'weight', 'energy', 'carbs', 'proteins', 'fats', 'food-weight-type-id'
    ];

    protected $table = 'foods';
    public $timestamps = false;

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
            'weight_type_id',
            'id',
            'id',
            'food_id'
        );

        return $this->belongsToMany(FoodWeightType::class)->withPivot('weight');
    }


}
