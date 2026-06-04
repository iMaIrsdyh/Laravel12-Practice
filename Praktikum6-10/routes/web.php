<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::get('/student', [StudentController::class, 'index']);
Route::get('/lingkaran1/{r}', [StudentController::class, 'lingkaran']);
Route::get('/products', [ProductController::class, 'index']);

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);