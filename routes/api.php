<?php

use App\Http\Controllers\Api\ImageGenerationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('images/generate', [ImageGenerationController::class, 'generate'])
        ->name('api.images.generate');
    
    Route::get('images/{requestId}/status', [ImageGenerationController::class, 'status'])
        ->name('api.images.status');
});
