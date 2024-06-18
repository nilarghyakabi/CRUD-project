<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;



Route::get('/', function () {
return view('welcome');
});

Route::get('/dashboard', function () {
        return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('product')->middleware(['auth'])->group(function () {
    Route::get('/', [productController::class, 'index'])->name('product-list');
    Route::get('/form', [productController::class, 'form'])->name('product-form');
    Route::post('/save', [productController::class, 'save'])->name('product-save');
    Route::get('/edit/{id}', [productController::class, 'edit'])->name('product-edit');
    Route::post('/update{id}', [productController::class, 'update'])->name('product-update');
    Route::get('/view/{id}', [productController::class, 'view'])->name('product-view');
    Route::get('/delete/{id}', [productController::class, 'delete'])->name('product-delete');
});
Route::prefix('customer')->middleware(['auth'])->group(function () {
    Route::get('/', [customerController::class, 'index'])->name('customer-list');
    Route::get('/form', [customerController::class, 'form'])->name('customer-form');
    Route::post('/save', [customerController::class, 'save'])->name('customer-save');
    Route::get('/edit/{id}', [customerController::class, 'edit'])->name('customer-edit');
    Route::post('/update{id}', [customerController::class, 'update'])->name('customer-update');
    Route::get('/view{id}', [customerController::class, 'view'])->name('customer-view');
    Route::get('/delete/{id}', [customerController::class, 'delete'])->name('customer-delete');
});

Route::prefix('cart')->middleware(['auth'])->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart');
    Route::get('/form', [CartController::class, 'form'])->name('cart-form');
    Route::post('/save', [CartController::class, 'save'])->name('cart-save');
    Route::get('/edit/{id}', [CartController::class, 'edit'])->name('cart-edit');
    Route::post('/update', [CartController::class, 'update'])->name('cart-update');
    Route::get('/view', [CartController::class, 'view'])->name('cart-view');
    Route::get('/delete/{id}', [CartController::class, 'delete'])->name('cart-delete');
});









require __DIR__.'/auth.php';
