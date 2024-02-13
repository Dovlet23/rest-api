<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('restaurant')->group(function () {
    Route::get('/', [\App\Http\Controllers\RestaurantController::class, 'index']);
    Route::post('store', [\App\Http\Controllers\RestaurantController::class, 'store']);
    Route::get('show/{id}', [\App\Http\Controllers\RestaurantController::class, 'show']);
    Route::delete('destroy/{id}', [\App\Http\Controllers\RestaurantController::class, 'destroy']);
});

Route::prefix('menu')->group(function () {
    Route::get('/', [\App\Http\Controllers\MenuController::class, 'index']);
    Route::post('store', [\App\Http\Controllers\MenuController::class, 'store']);
    Route::delete('destroy/{id}', [\App\Http\Controllers\MenuController::class, 'destroy']);
});
