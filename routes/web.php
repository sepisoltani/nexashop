<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login')->middleware('guest');
    Route::post('login', [LoginController::class, 'store'])->name('login.store')->middleware('guest');
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

    Route::middleware('auth')->group(function () {
        Route::redirect('/', '/admin/products');
        Route::resource('products', AdminProductController::class)->except('show');
    });
});
