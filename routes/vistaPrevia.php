<?php


use App\Http\Controllers\AnioController;

use Illuminate\Support\Facades\Route;

Route::get('/', [AnioController::class, 'pichichu'])->name('indice');

