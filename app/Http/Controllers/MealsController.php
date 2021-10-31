<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($date = "", $mealid = "" )
    {
        dd("stop not implemntet yet");
        return View('meals.index');
    }

}
