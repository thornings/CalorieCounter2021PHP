<?php

namespace App\Dtos;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Collection;

/**
 * The Data Transfer Object for all Meal Information.
 * It stores the mandatory data for a Calendar Meal Information,
 */
class MealInformationDTO
{
    private Collection $mealCalendarItems;
    private Meal $meal;
    private MealTotalsDTO $mealTotals;

    /**
     * Constructor
     *
     * @param  collection $mealCalendarItems
     * @param  Meal $meal
     * @param  MealTotalsDTO $mealTotals
     * @example new MealInformationDTO(array $mealCalendarItems, Meal, MealtotalsDTO);
     * @return void
     */
    public function __construct(Collection $mealCalendarItems, Meal $meal, MealTotalsDTO $mealTotals)
    {
        $this->mealCalendarItems = $mealCalendarItems;
        $this->meal = $meal;
        $this->mealTotals = $mealTotals;
    }

    /**
     * Get Meal
     *
     * @param  collection $mealCalendarItems
     * @example getMeal();
     * @return Meal
     */
    public function getMeal() : Meal
    {
        return $this->meal;
    }

  /**
     * Get CalendarItems from Meal
     *
     * @param  collection $mealCalendarItems
     * @example getMealCalendarItems();
     * @return Collection CalendarItem
     */
    public function getMealCalendarItems() : Collection
    {
        return $this->mealCalendarItems;
    }

    /**
     * Get Meal Totals
     *
     * @example getMealTotals();
     * @return MealTotalsDTO
     */
    public function getMealTotals() : MealTotalsDTO
    {
        return $this->mealTotals;
    }

}
