<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EquipmentController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('facilities', FacilityController::class);
Route::resource('services', ServiceController::class);
Route::resource('equipment', EquipmentController::class);