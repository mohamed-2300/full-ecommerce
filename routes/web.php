<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\StoreController;

Route::get('/', [StoreController::class, "index"]);

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);