<?php

use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/calendar/{calendardate?}', [App\Http\Controllers\HomeController::class, 'index'])->name('calendar');

Route::get('/calendar/{date}/meal/{mealid}', [App\Http\Controllers\MealsController::class, 'index'])->name('meal');

