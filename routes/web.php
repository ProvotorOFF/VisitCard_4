<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('cars/trashed', [CarController::class, 'trashed'])->name('cars.trashed');
Route::post('cars/{car}/restore', [CarController::class, 'restore'])->name('cars.restore');
Route::resource('cars', CarController::class);
Route::resource('brands', BrandController::class);
Route::resource('tags', TagController::class);
Route::post('comments/car/{car}', [CommentController::class, 'storeForCar'])->name('comments.store_car');
Route::post('comments/brand/{brand}', [CommentController::class, 'storeForBrand'])->name('comments.store_brand');
Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

require __DIR__ . '/auth.php';
