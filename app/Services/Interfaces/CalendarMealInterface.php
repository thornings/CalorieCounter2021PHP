<?php
namespace App\Services\Interfaces;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

interface CalendarMealInterface
{
   public function getMeals(): Collection;
   public function getCalendarItemsFromMeal($mealId, $date, $userId): Collection;
   public function calculateMealCarbsTotal(Collection $calendarItems): int;
   public function calculateMealProteinsTotal(Collection $calendarItems): int;
   public function calculateMealFatsTotal(Collection $calendarItems): int;
   public function getAllMealsInformations(Carbon $date): array;
}
