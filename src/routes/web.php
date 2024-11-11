<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ProductController::class, 'products']);

Route::get('/products/detail', [ProductController::class, 'detail']);

Route::get('/products/register', [ProductController::class, 'register']);