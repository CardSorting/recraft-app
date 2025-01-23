<?php

use App\Http\Controllers\Api\ImageGenerationController;
use App\Http\Controllers\Api\Emoji\CategoryController;
use App\Http\Controllers\Api\Emoji\SuggestionController;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

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

Route::middleware(EnsureFrontendRequestsAreStateful::class)->group(function () {
    Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
        // Image Generation Routes
        Route::post('images/generate', [ImageGenerationController::class, 'generate'])
            ->name('api.images.generate');
        Route::get('images/{requestId}/status', [ImageGenerationController::class, 'status'])
            ->name('api.images.status');

        // Emoji Routes
        Route::prefix('emoji')->group(function () {
            // Category Routes
            Route::get('categories', [CategoryController::class, 'index'])
                ->name('api.emoji.categories.index');
            Route::get('categories/{category}', [CategoryController::class, 'show'])
                ->name('api.emoji.categories.show');

            // Suggestion Routes
            Route::post('suggestions', [SuggestionController::class, 'suggestions'])
                ->name('api.emoji.suggestions');
            Route::post('translate', [SuggestionController::class, 'translate'])
                ->name('api.emoji.translate');
            Route::post('preview', [SuggestionController::class, 'preview'])
                ->name('api.emoji.preview');
        });
    });
});
