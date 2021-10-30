<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarItem extends Model
{
    use HasFactory;

    /**
     * Changeable fields
     */
    protected $fillable = [
        'weight', 'pieces', 'calendar_date', 'meal_id', 'user_id', 'selected_food_weight_type_id'
    ];

     /**
     * Get the selected FoodWeightType for this calendar Item
     */
    public function selectedFoodWeightType()
    {
        return $this->belongsTo(FoodWeightType::class);
    }

     /**
     * Get the user that owns this calendar Item
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
