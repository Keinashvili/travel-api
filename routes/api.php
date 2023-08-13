<?php

use App\Http\Controllers\Api\V1\Admin;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\TourController;
use App\Http\Controllers\Api\V1\TravelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', LoginController::class);

Route::get('/travels', [TravelController::class, 'index']);

Route::get('/travels/{travel}/tours', [TourController::class, 'index']);

Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::post('/travel/store', [Admin\TravelController::class, 'store']);
        Route::post('/travel/{travel:id}/tour/store', [Admin\TourController::class, 'store']);
    });

    Route::patch('/travel/{travel:id}/update', [Admin\TravelController::class, 'update'])->middleware('role:admin,editor');
});
