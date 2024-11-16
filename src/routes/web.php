<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'products']);

Route::post('/products', [ProductController::class, 'products']);

Route::post('/products/search', [ProductController::class, 'search']);

Route::get('/products/register', [ProductController::class, 'register']);

Route::post('/products/register', [ProductController::class, 'create']);

Route::get('/products/{id}', [ProductController::class, 'detail'])->name('product.detail');

Route::patch('/products/update', [ProductController::class, 'update']);