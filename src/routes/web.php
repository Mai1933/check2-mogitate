<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'products']);

Route::get('/products/{:productId}', [ProductController::class, 'detail']);

Route::get('/products/register', [ProductController::class, 'register']);

Route::get('/products/search', [ProductController::class, 'search']);