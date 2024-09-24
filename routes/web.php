<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('cars/trashed', [CarController::class, 'trashed'])->name('cars.trashed');
Route::post('cars/{car}/restore', [CarController::class, 'restore'])->name('cars.restore'); 
Route::resource('cars', CarController::class);

