<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'products']);

Route::post('/products', [ProductController::class, 'products']);

Route::get('/products/{id}', [ProductController::class, 'detail'])->name('product.detail');

Route::get('/products/register', [ProductController::class, 'register']);

Route::get('/products/search', [ProductController::class, 'search']);

Route::patch('/products/update', [ProductController::class, 'update']);