<?php
namespace App\Services\Interfaces;

use App\Dtos\CalendarDayInformationDTO;

interface CalendarDayInterface
{
   public function getCalendarDayInformations(array $mealsInformations) : CalendarDayInformationDTO;
   public function calculateEatenThisDay($mealInformation) : int;
   public function calculateLeftEnergyThisDay($eatenThisDay, $totalEnergySuggestion) : int;
   public function getEnergySuggestionForUser($user) : int;
   public function getTotalProteinsForThisDay($mealInformation) : int;
   public function getTotalCarbsForThisDay($mealInformation) : int;
   public function getTotalFatsForThisDay($mealInformation) : int;
}
