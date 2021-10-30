<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

         /**
     * Get the FoodWeightTypes for this WeightType.
     */
    public function FoodWeightTypes()
    {
        return $this->hasManyThrough(
            'App\Models\Food',
            'App\Models\FoodWeightType',

            // optional
            'weight_type_id', // the current model id in the pivot
            'id', // the id of related model
            'id', // the id of current model
            'food_id' // the related model id in the pivot
        );
    }
}
