<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin\{TravelController, TourController};

Route::controller(TravelController::class)->group(function () {
    Route::post('/travel/store', 'store');
    Route::delete('/travel/{travel:id}/delete', 'destroy');
});

Route::controller(TourController::class)->group(function () {
    Route::post('/travel/{travel:id}/tour/store', 'store');
    Route::delete('/travel/tour/{tour}/delete', 'destroy');
});
