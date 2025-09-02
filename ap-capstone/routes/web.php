<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutcomeController;

Route::resource('outcomes', OutcomeController::class);
Route::get('outcomes/{outcome}/download', [OutcomeController::class, 'download'])->name('outcomes.download');
Route::get('outcomes/{outcome}/view', [OutcomeController::class, 'view'])->name('outcomes.view');