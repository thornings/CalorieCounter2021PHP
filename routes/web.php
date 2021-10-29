<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::prefix('calendar')->group(function () {
    Route::get('/', function () {
    return view('welcome');
});

    // Route::get('/', [CalendarController::class, 'index' ]);
});

Route::get('/', function () {
    return view('welcome');
});
