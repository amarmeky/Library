<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)->group(function () {
    Route::get('categories', 'all')->name('categories.all');
    Route::get('categories/{id}', 'show')->name('categories.show');
    Route::middleware('auth')->group(function () {
        Route::get('categories/create', 'create')->name('categories.create');
        Route::post('categories', 'store')->name('categories.store');
        Route::get('categories/edit/{id}', 'edit')->name('categories.edit');
        Route::put('categories/{id}', 'update')->name('categories.update');
        Route::get('categories/delete/{id}', 'delete')->name('categories.delete');
    });
});
Route::controller(BookController::class)->group(function () {
    Route::get('books', 'all')->name('books.all');
    Route::get('books/{id}', 'show')->name('books.show');
    Route::middleware('auth')->group(function () {
        Route::get('books/create', 'create')->name('books.create');
        Route::post('books', 'store')->name('books.store');
        Route::get('books/edit/{id}', 'edit')->name('books.edit');
        Route::put('books/{id}', 'update')->name('books.update');
        Route::get('books/delete/{id}', 'delete')->name('books.delete');
    });
});
Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('register', 'registerForm')->name('register.form');
        Route::post('register', 'register')->name('register');
        Route::get('login', 'loginForm')->name('login.form');
        Route::post('login', 'login')->name('login');
    });
    Route::post('logout', 'logout')->name('logout')->middleware('auth');
});
Route::fallback(function () {
    return redirect()->route('books.all');
});
