<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin\{TravelController};

Route::controller(TravelController::class)->group(function () {
    Route::post('/travels', 'store')->name('admin.travel.store');
});