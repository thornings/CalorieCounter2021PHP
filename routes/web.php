<?php

use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/', [CalendarController::class, 'index' ]);

    // Route::get('/', [CalendarController::class, 'index' ]);
