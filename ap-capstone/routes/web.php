<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\OutcomeController;

Route::resource('participants', ParticipantController::class);
Route::resource('outcomes', OutcomeController::class);
