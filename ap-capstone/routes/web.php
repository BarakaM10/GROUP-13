<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacilityController;

Route::resource('facilities', FacilityController::class);
