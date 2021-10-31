<?php

namespace App\Dtos;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Collection;

/**
 * The Data Transfer Object for a calendar day information.
 * It stores the mandatory data for a Calendar Day Information,
 */
class CalendarDayInformationDTO
{
    private int $mealCarbsTotal;
    private int $mealProteinsTotal;
    private int $mealFatsTotal;

/**
     * Constructor
     *
     * @param int $eatenThisDay
     * @param int $mealCalendarItems
     * @param int $leftThisDay
     * @param int $totalDayProteins
     * @param int $totalDayCarbs
     * @param int $totalDayFats

     * @return void
     */
    public function __construct(
        int $eatenThisDay,
        int $totalEnergySuggestion,
        int $leftThisDay,
        int $totalDayProteins,
        int $totalDayCarbs,
        int $totalDayFats)
    {
        $this->eatenThisDay = $eatenThisDay;
        $this->totalEnergySuggestion = $totalEnergySuggestion;
        $this->leftThisDay = $leftThisDay;
        $this->totalDayProteins = $totalDayProteins;
        $this->totalDayCarbs = $totalDayCarbs;
        $this->totalDayFats = $totalDayFats;
    }

    /**
     * Get how mush user have been eating this day
     *
     * @example getEatenThisDay();
     * @return int
     */
    public function getEatenThisDay() : int
    {
        return $this->eatenThisDay;
    }

    /**
     * Get how mush user is suggested to eat for a day
     *
     * @example getTotalEnergySuggestion();
     * @return int
     */
    public function getTotalEnergySuggestion() : int
    {
        return $this->totalEnergySuggestion;
    }

    /**
     * Get how mush user have left eating for calendar day
     *
     * @example getLeftThisDay();
     * @return int
     */
    public function getLeftThisDay() : int
    {
        return $this->leftThisDay;
    }

    /**
     * Get how many Proteins user have been eating this day
     *
     * @example getTotalDayProteins();
     * @return int
     */
    public function getTotalDayProteins() : int
    {
        return $this->totalDayProteins;
    }

    /**
     * Get how many Carbs user have been eating this day
     *
     * @example getTotalDayCarbs();
     * @return int
     */
    public function getTotalDayCarbs() : int
    {
        return $this->totalDayCarbs;
    }

    /**
     * Get how many Fats user have been eating this day
     *
     * @example getTotalDayFats();
     * @return int
     */
    public function getTotalDayFats() : int
    {
        return $this->totalDayFats;
    }

}
