<?php

namespace App\Http\Controllers\Api\Emoji;

use App\Http\Controllers\Controller;
use App\Services\Emoji\Contracts\EmojiTranslatorInterface;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(
        private readonly EmojiTranslatorInterface $emojiTranslator
    ) {}

    /**
     * Get all emoji categories with their emojis
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'categories' => $this->emojiTranslator->getAllEmojis()
        ]);
    }

    /**
     * Get emojis for a specific category
     */
    public function show(string $categoryName): JsonResponse
    {
        $categories = $this->emojiTranslator->getAllEmojis();
        
        if (!isset($categories[$categoryName])) {
            return response()->json([
                'error' => 'Category not found'
            ], 404);
        }

        return response()->json([
            'category' => $categoryName,
            'data' => $categories[$categoryName]
        ]);
    }
}
