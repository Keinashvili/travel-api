<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin\{TourController, TravelController};

Route::controller(TravelController::class)->group(function () {
    Route::post('/travel/store', 'store');
});

Route::controller(TourController::class)->group(function () {
    Route::post('/travel/{travel:id}/tour/store', 'store');
});
