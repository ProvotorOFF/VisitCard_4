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
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');

Route::resource('cars', CarController::class)->only(['index', 'show']);
Route::resource('brands', BrandController::class)->only(['index', 'show']);
Route::resource('tags', TagController::class)->only(['index', 'show']);

Route::middleware('auth')->group(function () {
    Route::post('cars/{car}/restore', [CarController::class, 'restore'])->name('cars.restore');
    Route::resource('cars', CarController::class)->except(['index', 'show']);
    Route::resource('brands', BrandController::class)->except(['index', 'show']);
    Route::resource('tags', TagController::class)->except(['index', 'show']);
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

require __DIR__ . '/auth.php';
