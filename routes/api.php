<?php

use App\Http\Controllers\Api\V1\{Auth\LoginController,
    Auth\RegisterController,
    TourController,
    TravelController,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);

Route::controller(TravelController::class)->group(function () {
    Route::get('/travels', 'index');
    Route::get('/travel/{travel}', 'show');
});

Route::controller(TourController::class)->group(function () {
    Route::get('/travels/{travel}/tours', 'index');
    Route::get('/travel/tour/{tour}/show', 'show');
});

Route::middleware(['auth:sanctum', 'role:admin'])
    ->group(fn() => require_once __DIR__ . '/admin.php');

Route::middleware(['auth:sanctum', 'role:admin,editor'])
    ->group(fn() => require_once __DIR__ . '/editor.php');
