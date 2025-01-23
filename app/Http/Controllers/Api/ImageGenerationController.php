<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Recraft\Contracts\RecraftServiceInterface;
use App\Services\Emoji\Contracts\EmojiTranslatorInterface;
use App\Services\Recraft\DTOs\ImageGenerationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Exception;

class ImageGenerationController extends Controller
{
    public function __construct(
        private readonly RecraftServiceInterface $recraftService,
        private readonly EmojiTranslatorInterface $emojiTranslator
    ) {}

    /**
     * Generate an image using the provided prompt
     */
    public function generate(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'emojis' => 'required|array',
                'emojis.*' => 'string',
                'image_size' => 'nullable|string|in:square_hd,square,portrait_4_3,portrait_16_9,landscape_4_3,landscape_16_9',
                'style' => 'nullable|string',
                'colors' => 'nullable|array',
                'style_id' => 'nullable|string',
            ]);

            // Get the translated prompt from emoji combination
            $prompt = $this->emojiTranslator->translate($validated['emojis']);

            $generationRequest = new ImageGenerationRequest(
                prompt: $prompt,
                imageSize: $validated['image_size'] ?? 'square_hd',
                style: $validated['style'] ?? 'realistic_image',
                colors: $validated['colors'] ?? [],
                styleId: $validated['style_id'] ?? null,
            );

            $response = $this->recraftService->generateImage($generationRequest);

            return response()->json($response->toArray(), 201);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Image generation failed',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get the status of a generation request
     */
    public function status(string $requestId): JsonResponse
    {
        try {
            $status = $this->recraftService->getGenerationStatus($requestId);
            return response()->json($status);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Status check failed',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
