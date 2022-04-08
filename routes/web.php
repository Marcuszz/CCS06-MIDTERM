<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

Route::get('start', [StudentsController::class, 'start']);
Route::post('enter-attempts', [StudentsController::class, 'enterAttempts']);
Route::post('compute-power', [StudentsController::class, 'computePower']);