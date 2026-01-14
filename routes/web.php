<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)->group(function () {
    Route::get('categories', 'all')->name('categories.all');
    Route::get('categories/create', 'create')->name('categories.create');
    Route::post('categories', 'store')->name('categories.store');
    Route::get('categories/edit/{id}', 'edit')->name('categories.edit');
    Route::put('categories/{id}', 'update')->name('categories.update');
    Route::get('categories/{id}', 'show')->name('categories.show');
    Route::get('categories/delete/{id}', 'delete')->name('categories.delete');
});
