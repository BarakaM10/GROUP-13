<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\OutcomeController;

Route::resource('participants', ParticipantController::class);
Route::resource('outcomes', OutcomeController::class);
