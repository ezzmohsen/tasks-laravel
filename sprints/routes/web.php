<?php

use App\Http\Controllers\sprintsController;
use Illuminate\Support\Facades\Route;

Route::get('/task7', [sprintsController::class, 'index'])->name('home');
