<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\StoreController;



Route::get('/', [StoreController::class, "index"]);



// admin, users, editors

// users: [..., 
// role= [0: users, 1:editor, 2:admin]
// ]

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// admin
Route::middleware(['admin'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/admin/dashboard', function () {
    return 'hi administrator';
})->name('admin_dashboard');
});

// editor
Route::middleware(['editor'])->group(function () {
    Route::get('/editor/dashboard', function () {
    return 'hi editor';
})->name('editor_dashboard');
});

require __DIR__.'/auth.php';
