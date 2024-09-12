<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'cars', 'as' => 'cars.'], function() {
    Route::get('', [CarController::class, 'index'])->name('index');
    Route::get('create', [CarController::class, 'create'])->name('create');
    Route::get('{car}/edit', [CarController::class, 'edit'])->name('edit');
    Route::get('{car}', [CarController::class, 'show'])->where('car', '[0-9]+')->name('show');
    Route::post('store', [CarController::class, 'store'])->name('store');
    Route::put('{car}/update', [CarController::class, 'update'])->name('update');
    Route::delete('{car}/destroy', [CarController::class, 'destroy'])->name('destroy');;
});
