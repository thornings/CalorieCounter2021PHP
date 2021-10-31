<?php

namespace App\Dtos;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Collection;

/**
 * The Data Transfer Object for MealTotals (Carb-, Protein- and Fattotals of a single meal).
 * It stores the mandatory data for a Calendar Meal Information,
 */
class MealTotalsDTO
{
    private int $mealCarbsTotal;
    private int $mealProteinsTotal;
    private int $mealFatsTotal;

    /**
     * Constructor
     *
     * @param  int $mealCarbsTotal
     * @param  int $mealProteinsTotal
     * @param  int $mealFatsTotal
     * @example new MealTotalsDato(12, 32, 45);
     * @return void
     */
    public function __construct(int $mealCarbsTotal, int $mealProteinsTotal, int $mealFatsTotal)
    {
        $this->mealCarbsTotal = $mealCarbsTotal;
        $this->mealProteinsTotal = $mealProteinsTotal;
        $this->mealFatsTotal = $mealFatsTotal;
    }

    /**
     * Get total carbs of Meal
     *
     * @example getMealCarbsTotal();
     * @return int carbs
     */
    public function getMealCarbsTotal() : int
    {
        return $this->mealCarbsTotal;
    }

    /**
     * Get total proteins of Meal
     *
     * @example getMealProteinsTotal();
     * @return int proteins
     */
    public function getMealProteinsTotal() : int
    {
        return $this->mealProteinsTotal;
    }

    /**
     * Get fats of Meal
     *
     * @example getMealFatsTotal();
     * @return int fats
     */
    public function getMealFatsTotal() : int
    {
        return $this->mealFatsTotal;
    }

}
