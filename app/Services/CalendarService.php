<?php

namespace App\Services;

use App\Dtos\CalendarDayInformationDTO;
use App\Dtos\MealTotalsDTO;
use App\Models\CalendarItem;
use App\Models\Meal;
use App\Services\Interfaces\CalendarServiceInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class CalendarService implements CalendarServiceInterface
{

    protected $calendarItems;

    /**
     * MEALS SECTIION
    */

    /**
     * Get all information for CalendarMeal
     *
     * @param  Carbon date $date
     * @example getAllMealsInformation(new Carbon::Today)
     * @return array of MealTotalsDTO
     */
    public function getAllMealsInformations(Carbon $date) : array {
        $meals = $this->getMeals();
        $userId = Auth::Id();
        $mealsInformation = [];

        foreach ($meals as $meal) {
            $calendarItems = $this->getCalendarItemsFromMeal($meal->id, $date, $userId);

            $mealCarbsTotal = $this->calculateMealCarbsTotal($calendarItems);
            $mealProteinsTotal = $this->calculateMealProteinsTotal($calendarItems);
            $mealFatsTotal = $this->calculateMealFatsTotal($calendarItems);
            $mealTotalsDTO = new MealTotalsDTO($mealCarbsTotal, $mealProteinsTotal, $mealFatsTotal);
            $mealsInformation[] = $mealTotalsDTO;
        }
        return $mealsInformation;
    }

    /**
     * Get Meal collection
     *
     * @example getMeals()
     * @return Collection of Meal
     */
    public function getMeals(): Collection {
        return Meal::all();
    }

    /**
     * Get Calendar Items collection for specific meal in specific day for user
     *
     * @param int $mealId
     * @param Carbon $date
     * @param int $userId
     * @example getCalendarItemsFromMeal(1('breakfast'), new Carbon::Today, 1)
     * @return Collection of Meal
     */
    public function getCalendarItemsFromMeal($mealId, $date, $userId): Collection {
        return CalendarItem::Where('user_id', $userId)
                ->WhereDate('calendar_date', '=', $date)
                ->Where('meal_id', $mealId)
                ->get();
    }

    /**
     * Get CarbsTotal from all foods in a Meal
     *
     * @param Collection of CalendarItem $calendarItem
     * @example calculateMealCarbsTotal( array )
     * @return int all carbs
     */
     public function calculateMealCarbsTotal(Collection $calendarItems): int {
        $carbsTotal = 0;
        foreach ($calendarItems as $item) {
            $foodWeightType = $item->selectedFoodWeightType;
            $food = $foodWeightType->Food;
            $carbs = $food->carbs * $foodWeightType->weight * $item->pieces;
            $carbsTotal += $carbs;
        }

         return $carbsTotal;
     }

    /**
     * Get ProteinTotal from all foods in a Meal
     *
     * @param Collection of CalendarItem $calendarItem
     * @example calculateMealProteinsTotal( array )
     * @return int all proteins
     */
    public function calculateMealProteinsTotal(Collection $calendarItems): int {
        $proteinsTotal = 0;
        foreach ($calendarItems as $item) {
            $foodWeightType = $item->selectedFoodWeightType;
            $food = $foodWeightType->Food;
            $proteins = $food->proteins * $foodWeightType->weight * $item->pieces;
            $proteinsTotal += $proteins;
        }
         return $proteinsTotal;
    }

   /**
     * Get FatsTotal from all foods in a Meal
     *
     * @param Collection of CalendarItem $calendarItem
     * @example calculateMealFatsTotal( array )
     * @return int all fats
     */
    public function calculateMealFatsTotal(Collection $calendarItems): int {
        $fatsTotal = 0;
        foreach ($calendarItems as $item) {
            $foodWeightType = $item->selectedFoodWeightType;
            $food = $foodWeightType->Food;
            $fats = $food->fats * $foodWeightType->weight * $item->pieces;
            $fatsTotal += $fats;
        }
        return $fatsTotal;
    }


    /**
     * Calendar Days information
     */

   /**
     * Get ProteinTotal from all foods in a Meal
     *
     * @param Collection of CalendarItem $calendarItem
     * @example calculateMealProteinsTotal( array )
     * @return int all proteins
     */

    public function getCalendarDayInformations(array $mealsInformations) : CalendarDayInformationDTO {
        $eatenThisDay = $this->calculateEatenThisDay($mealsInformations);
        $totalEnergySuggestion = $this->getEnergySuggestionForUser(Auth::Id());
        $leftThisDay = $this->calculateLeftEnergyThisDay($eatenThisDay, $totalEnergySuggestion);
        $totalDayProteins = $this->getTotalProteinsForThisDay($mealsInformations);
        $totalDayCarbs = $this->getTotalCarbsForThisDay($mealsInformations);
        $totalDayFats = $this->getTotalFatsForThisDay($mealsInformations);

        return new CalendarDayInformationDTO(
            $eatenThisDay,
            $totalEnergySuggestion,
            $leftThisDay,
            $totalDayProteins,
            $totalDayCarbs,
            $totalDayFats
        );
    }


    /**
     * Calculate how much energy user have been eating this date
     *
     * @param $mealsInformation (array of CalendarDayInformationDTO)
     * @example calculateEatenThisDay( array )
     * @return int eaten energy
     */
    public function calculateEatenThisDay($mealsInformation) : int {
        $eaten = 0;
        foreach($mealsInformation as $meal)
        {
            foreach($meal as $mealTotals) {
                $eaten += $mealTotals->getMealCarbsTotal()*4;
                $eaten += $mealTotals->getMealProteinsTotal()*4;
                $eaten += $mealTotals->getMealFatsTotal()*9;
            }
        }
        return $eaten;
    }

     /**
     * Calculate how many kcal the user have left of suggested intake
     *
     * @param int $eatenThisDay
     * @param int $totalEnergySuggestion
     * @example calculateLeftEnergyThisDay( $eatenThisDay, $totalEnergySuggestion )
     * @return int left energy for day
     */
    public function calculateLeftEnergyThisDay($eatenThisDay, $totalEnergySuggestion) : int {
        $leftEnergy = $totalEnergySuggestion - $eatenThisDay;
        return ($leftEnergy<0) ? 0 : $leftEnergy;
    }

     /**
     * Calculate how many kcal the user have left of suggested intake
     *
     * @param int $eatenThisDay
     * @param int $totalEnergySuggestion
     * @example getEnergySuggestionForUser( $user )
     * @todo add formel to calculate correct daily energy suggestion
     * @return int suggestion
     */
    public function getEnergySuggestionForUser($user) : int {
        return 2549;
    }

    /**
     * Calculate how many proteins the user have used today
     *
     * @param array MealInformationDTO $mealsInformation
     * @example getTotalProteinsForThisDay( array )
     * @return int total Proteins for day
     */
    public function getTotalProteinsForThisDay($mealsInformation) : int {
        $proteins = 0;
        foreach($mealsInformation as $meal)
        {
            foreach($meal as $mealTotals) {
                $proteins += $mealTotals->getMealProteinsTotal()*4;
            }
        }
        return $proteins;
    }

    /**
     * Calculate how many Carbs the user have used today
     *
     * @param array MealInformationDTO $mealsInformation
     * @example getTotalCarbsForThisDay( array )
     * @return int total Carbs for day
     */
    public function getTotalCarbsForThisDay($mealInformation) : int {
        $carbs = 0;
        foreach($mealInformation as $meal)
        {
            foreach($meal as $mealTotals) {
                $carbs += $mealTotals->getMealCarbTotal()*4;
            }
        }
        return $carbs;
    }

    /**
     * Calculate how many fats the user have used today
     *
     * @param array MealInformationDTO $mealsInformation
     * @example getTotalFatsForThisDay( array )
     * @return int total Fats for day
     */
    public function getTotalFatsForThisDay($mealInformation) : int {
        $fats = 0;
        foreach($mealInformation as $meal)
        {
            foreach($meal as $mealTotals) {
                $fats += $mealTotals->getMealFatsTotal()*4;
            }
        }
        return $fats;
    }
}
