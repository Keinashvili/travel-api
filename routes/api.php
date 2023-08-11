<?php

use App\Http\Controllers\Api\V1\TravelController;
use App\Http\Controllers\Api\V1\TourController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(TravelController::class)->group(function () {
    Route::get('/travels', 'index')->name('travel.index');
});

Route::controller(TourController::class)->group(function () {
    Route::get('/travels/{travel}/tours', 'index')->name('tour.index');
});


Route::prefix('/admin')->group(fn() => require_once __DIR__ . '/./admin.php');
