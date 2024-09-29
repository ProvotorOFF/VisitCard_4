<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('cars/trashed', [CarController::class, 'trashed'])->name('cars.trashed');
Route::post('cars/{car}/restore', [CarController::class, 'restore'])->name('cars.restore'); 
Route::resource('cars', CarController::class);
Route::resource('brands', BrandController::class);
Route::resource('tags', TagController::class);

