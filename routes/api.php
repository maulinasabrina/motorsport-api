<?php 

use App\Http\Controllers\Api\Drivers\DriverController;
use Illuminate\Support\Facades\Route;


Route::prefix('drivers')->group(function () {
    Route::get('/', [DriverController::class, 'index']);
    Route::get('/{id}', [DriverController::class, 'show']);
        Route::post('/', [DriverController::class, 'store']);
        Route::put('/{id}', [DriverController::class, 'update']);
        Route::delete('/{id}', [DriverController::class, 'destroy']);

    //Protected routes
    // Route::middleware('auth:sanctum')->group(function () {
    //     Route::post('/', [DriverController::class, 'store']);
    //     Route::put('/{id}', [DriverController::class, 'update']);
    //     Route::delete('/{id}', [DriverController::class, 'destroy']);
    // });
});