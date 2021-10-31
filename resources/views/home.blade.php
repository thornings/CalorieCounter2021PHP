@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10 mt-5 text-center ">

            <div class="row justify-content-around col-md-12">
                <div onclick="alert('previous')" class="col-4">&lt;</div>
                <h3 class="col-4">Date</h3>
                <div onclick="alert('next')" class="col-4">&gt;</div>
            </div>

        </div>

        <div class="col-md-8 justify-content-center text-center bg-info rounded p-5 mb-5 mt-1">
            <div class="pb-3">
                <div class=" justify-content-between row">
                    <strong class="col-4">Eaten</strong>
                    <strong class="col-4">Left</strong>
                    <strong class="col-4">Total</strong>
                </div>

                <div class=" justify-content-between row" >
                    <div class="col-4">{{$dayInfo->getEatenThisDay()}}</div>
                    <div class="col-4">{{$dayInfo->getLeftThisDay()}}</div>
                    <div class="col-4">{{$dayInfo->getTotalEnergySuggestion()}}</div>
                </div>
            </div>

            <div class=" justify-content-between row" >
                <strong class="col-4">Carbs</strong>
                <strong class="col-4">Proteins</strong>
                <strong class="col-4">Fats</strong>
            </div>

            <div class=" justify-content-between row" >
                <div class="col-4">{{$dayInfo->getTotalDayCarbs()}}</div>
                <div class="col-4">{{$dayInfo->getTotalDayProteins()}}</div>
                <div class="col-4">{{$dayInfo->getTotalDayFats()}}</div>
            </div>

        </div>

        <div class="col-md-8 text-center">
            <h3 class="col-12">Meals</h3>
        </div>

        <div class="col-md-8 justify-content-center text-center bg-dark text-white-50 rounded p-5 mb-5 mt-0">

            @foreach ($mealsInfo as $mealInfo )
                <div class="justify-content-between row">

                    <a data-toggle="collapse" href="#mealInfo-{{$mealInfo->getMeal()->id}}" role="button" aria-controls="mealInfo-{{$mealInfo->getMeal()->id}}">
                        <p>{{$mealInfo->getMeal()->name}} <span>&nbsp;({{$mealInfo->getMealTotals()->getMealCarbsTotal()}}, {{$mealInfo->getMealTotals()->getMealProteinsTotal()}}, {{$mealInfo->getMealTotals()->getMealFatsTotal()}})</span></p>
                    </a>

                    <a href="{{ URL::route('meal', ['mealid' => $mealInfo->getMeal()->id, 'date' => $calendarDate->toDateString() ]) }}">
                        <i class="fa fa-plus text-white"></i>
                    </a>
                </div>

                <div class="collapse text-info pl-0 mb-3 text-left" id="mealInfo-{{$mealInfo->getMeal()->id}}">
                    @foreach ($mealInfo->getMealCalendarItems() as $calendarItem )
                        <p>{{$calendarItem->selectedFoodWeightType->Food->name}}&nbsp;({{$calendarItem->selectedFoodWeightType->Food->energy}} kcal)</p>
                    @endforeach
                </div>
            @endforeach

        </div>

    </div>
</div>
@endsection
