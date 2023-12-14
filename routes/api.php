<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuotesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth.api.token')->group(function () {
    Route::get('/quotes', [QuotesController::class, 'index']);
    Route::post('/quotes/refresh', [QuotesController::class, 'refresh']);
});
