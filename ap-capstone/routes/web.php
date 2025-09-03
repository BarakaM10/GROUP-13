<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ParticipantController;

Route::resource('participants', ParticipantController::class);
Route::resource('outcomes', OutcomeController::class);
Route::resource('projects', ProjectController::class);
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('outcomes', OutcomeController::class);
Route::get('outcomes/{outcome}/download', [OutcomeController::class, 'download'])->name('outcomes.download');
Route::get('outcomes/{outcome}/view', [OutcomeController::class, 'view'])->name('outcomes.view');
Route::resource('facilities', FacilityController::class);
Route::resource('services', ServiceController::class);
Route::resource('equipment', EquipmentController::class);
