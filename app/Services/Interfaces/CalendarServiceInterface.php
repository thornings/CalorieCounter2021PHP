<?php
namespace App\Services\Interfaces;

use App\Dtos\CalendarDayInformationDTO;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

interface CalendarServiceInterface extends CalendarMealInterface, CalendarDayInterface
{
   // calendar meal information
   public function getMeals(): Collection;
   public function getAllMealsInformations(Carbon $date) : array;
   public function getCalendarItemsFromMeal($mealId, $date, $userId): Collection;
   public function calculateMealCarbsTotal(Collection $calendarItems): int;
   public function calculateMealProteinsTotal(Collection $calendarItems): int;
   public function calculateMealFatsTotal(Collection $calendarItems): int;

   // calendar day information
   public function getCalendarDayInformations(array $mealsInformations) : CalendarDayInformationDTO;
   public function calculateEatenThisDay($mealInformation) : int;
   public function calculateLeftEnergyThisDay($eatenThisDay, $totalEnergySuggestion) : int;
   public function getEnergySuggestionForUser($user) : int;
   public function getTotalProteinsForThisDay($mealInformation) : int;
   public function getTotalCarbsForThisDay($mealInformation) : int;
   public function getTotalFatsForThisDay($mealInformation) : int;

}
