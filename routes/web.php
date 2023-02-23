<?php

use App\Http\Controllers\ComicsController;
use App\Http\Controllers\HomesController as HomesController;
use App\Models\Comic;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomesController::class, 'index'])->name('homepage');

Route::resource('comics', ComicsController::class);
