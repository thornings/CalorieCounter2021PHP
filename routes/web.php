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

Route::get('/calendar', [App\Http\Controllers\HomeController::class, 'index'])->name('calendar');
Route::get('/calendar/meal', [App\Http\Controllers\MealController::class, 'index'])->name('meal');
