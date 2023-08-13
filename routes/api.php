<?php

use App\Http\Controllers\Api\V1\{ TravelController, TourController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(TravelController::class)->group(function () {
    Route::get('/travels', 'index');
});

Route::controller(TourController::class)->group(function () {
    Route::get('/travels/{travel}/tours', 'index');
});

Route::prefix('admin')
    ->middleware(['auth:sanctum', 'role:admin'])
    ->group(base_path('routes/admin.php'));

Route::middleware('guest')
    ->group(base_path('routes/auth.php'));
