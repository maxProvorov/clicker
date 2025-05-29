<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::middleware(['throttle:api'])->get('/{code}', [UrlController::class, 'redirect']);
