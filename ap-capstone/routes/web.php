<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectParticipantsController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\OutcomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('programs', ProgramController::class);
Route::get('programs/{program}/projects', [ProgramController::class, 'projects'])->name('programs.projects');

Route::resource('facilities', FacilityController::class);
Route::get('facilities/{facility}/services', [FacilityController::class, 'services'])->name('facilities.services');
Route::get('facilities/{facility}/equipment', [FacilityController::class, 'equipment'])->name('facilities.equipment');
Route::get('facilities/{facility}/projects', [FacilityController::class, 'projects'])->name('facilities.projects');

Route::resource('services', ServiceController::class);

Route::resource('equipment', EquipmentController::class);

Route::resource('projects', ProjectController::class);
Route::post('projects/{project}/assign-participant', [ProjectController::class, 'assignParticipant'])->name('projects.assignParticipant');

Route::delete('/project-participants/{id}', [ProjectParticipantsController::class, 'destroy'])->name('project_participants.destroy');

Route::resource('participants', ParticipantController::class);
Route::get('participants/{participant}/projects', [ParticipantController::class, 'projects'])->name('participants.projects');

Route::resource('outcomes', OutcomeController::class);