<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\AuthController;


Route::post('/shorten', [UrlController::class, 'shorten']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->get('/statistics/{code}', [StatisticsController::class, 'show']);