<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('categories', [CategoryController::class, 'all']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::get('categories/create', [CategoryController::class, 'create']);
Route::post('categories', [CategoryController::class, 'store']);
