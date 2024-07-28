<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\sprintsController;
use App\Http\Controllers\UpdateController;
use Illuminate\Support\Facades\Route;

Route::get('/task7', [sprintsController::class, 'index'])->name('home');

// routes/web.php



Route::get('/blogs', [UpdateController::class, 'index']);
Route::get('/blogs/{id}/edit', [UpdateController::class, 'edit']);
Route::put('/blogs/{id}', [UpdateController::class, 'updateData']);


Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');