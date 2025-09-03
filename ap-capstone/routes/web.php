<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EquipmentController;

Route::resource('services', ServiceController::class);
Route::resource('equipment', EquipmentController::class);


