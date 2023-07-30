<?php

use App\Modules\Room\Controllers\RoomController;
use App\Modules\Room\Controllers\RoomTypeController;
use Illuminate\Support\Facades\Route;

Route::post('create', [RoomController::class, 'store'])->name('create');
Route::name('type.')->prefix('type')->group(
    function () {
        Route::post('create', [RoomTypeController::class, 'store'])->name('create');
    }
);
