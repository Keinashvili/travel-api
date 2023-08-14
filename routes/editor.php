<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin\{TravelController, TourController};

Route::controller(TravelController::class)->group(function () {
    Route::get('/travels', 'index');
    Route::get('/travel/{travel:id}/show', 'show');
    Route::patch('/travel/{travel:id}/update', 'update');
});

Route::controller(TourController::class)->group(function () {
    Route::get('/travel/{travel:id}/tours', 'index');
    Route::get('/travel/tour/{tour}/show', 'show');
    Route::patch('/travel/tour/{tour}/update', 'update');
});
