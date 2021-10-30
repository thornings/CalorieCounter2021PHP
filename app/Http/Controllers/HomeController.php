<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(string $calendardate = "-")
    {
        $date = Carbon::Today();

        //if ($date!="" && Carbon::createFromFormat('Y-m-d', $date) !== false) {
        if ($calendardate!="-" &&  Carbon::createFromFormat('Y-m-d', $calendardate) !== false) {
            dd("stop her");
            $date = Carbon::parse($calendardate);
        }
        // dump($date);
        // dd("efter");

        return view('home', ['calendarDate' => $date]);
    }
}
