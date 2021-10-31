<?php

namespace App\Http\Controllers;

use App\Models\CalendarItem;
use App\Services\Interfaces\CalendarServiceInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
     private $calendarService;

    /**
     * Create a new controller instance.
     * Adding Authentication
     * @param CalendarService $calendarService
     * @return void
     */
    public function __construct(CalendarServiceInterface $calendarService)
    {
        $this->middleware('auth');
        $this->calendarService = $calendarService;
    }

    /**
     * Show the calendar index page.
     *
     * If a date throws a error, use Carbon today
     *
     * @param Carbon $calendarDate
     * @example /calendar/2021-11-22
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(string $calendardate = "-")
    {
        $date = Carbon::Today();

        try {
            if ($calendardate!="-" &&  Carbon::createFromFormat('Y-m-d', $calendardate) !== false) {
                $date = Carbon::parse($calendardate);
            }
        } catch (\Carbon\Exceptions\InvalidDateException | \Carbon\Exceptions\InvalidFormatException | Exception $exp) {
            // $date = Carbon::Today();
        }

        $mealsInformations = $this->calendarService->getAllMealsInformations($date);

        $calendarDayInformations = $this->calendarService->getCalendarDayInformations($mealsInformations);
        // dump($mealsInformations);
        // dd();

        // create view with params
        return view('home', [
            'calendarDate' => $date,
            'mealsInfo' => $mealsInformations,
            'dayInfo' => $calendarDayInformations]
        );
    }
}
