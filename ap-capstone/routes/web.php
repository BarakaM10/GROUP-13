<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacilityController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('facilities', FacilityController::class);
