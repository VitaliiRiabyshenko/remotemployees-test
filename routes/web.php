<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LotController;
use Illuminate\Support\Facades\Route;


/* Lots */
Route::get('/', [LotController::class, 'index'])->name('lot.index');
Route::resource('/lot', LotController::class)->except('index');

/* Categories */
Route::resource('/category', CategoryController::class);