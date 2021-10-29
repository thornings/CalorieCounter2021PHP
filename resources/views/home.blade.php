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
                    <div class="col-4">0</div>
                    <div class="col-4">1992</div>
                    <div class="col-4">2550</div>
                </div>
            </div>

            <div class=" justify-content-between row" >
                <strong class="col-4">Carbs</strong>
                <strong class="col-4">Proteins</strong>
                <strong class="col-4">Fats</strong>
            </div>

            <div class=" justify-content-between row" >
                <div class="col-4">122</div>
                <div class="col-4">52</div>
                <div class="col-4">35</div>
            </div>

        </div>

        <div class="col-md-8 text-center">
            <h3 class="col-12">Meals</h3>
        </div>

        <div class="col-md-8 justify-content-center text-center bg-dark text-white-50 rounded p-5 mb-5 mt-0">

            <div class="justify-content-between row">

                <a data-toggle="collapse" href="#mealone" role="button" aria-controls="mealone">
                    <p>Breakfast <span>&nbsp;(21, 8, 32)</span></p>
                </a>

                <a href="{{ URL::route('meal', ['meal' => '1', 'calendarDate' => $calendarDate->toDateString() ]) }}">
                    <i class="fa fa-plus text-white"></i>
                </a>
            </div>

            <div class="collapse text-info pl-0 mb-3 text-left" id="mealone">
                <p>Banana and Apples&nbsp;(125 kcal 2 pieces)</p>
                <p>Fish&nbsp;(325 kcal 2 pieces)</p>
            </div>

            <div class="justify-content-between row">
                <p>Launch</p>
                <a href="{{ URL::route('meal', ['meal' => '2', 'calendarDate' => $calendarDate->toDateString() ]) }}">
                    <i class="fa fa-plus text-white"></i>
                </a>
            </div>

            <div class="justify-content-between row">
                <p>Dinner</p>
                <a href="{{ URL::route('meal', ['meal' => '3', 'calendarDate' => $calendarDate->toDateString() ]) }}">
                    <i class="fa fa-plus text-white"></i>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
