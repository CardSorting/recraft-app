<?php

namespace App\Http\Controllers\Api\Emoji;

use App\Http\Controllers\Controller;
use App\Services\Emoji\Contracts\EmojiTranslatorInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    public function __construct(
        private readonly EmojiTranslatorInterface $emojiTranslator
    ) {}

    /**
     * Get suggested emoji combinations
     */
    public function suggestions(Request $request): JsonResponse
    {
        $emoji = $request->validate([
            'emoji' => 'required|string'
        ])['emoji'];

        return response()->json([
            'suggestions' => $this->emojiTranslator->getSuggestions($emoji)
        ]);
    }

    /**
     * Translate emojis to text prompt
     */
    public function translate(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'emojis' => 'required|array',
            'emojis.*' => 'string'
        ]);

        return response()->json([
            'translation' => $this->emojiTranslator->translate($validated['emojis'])
        ]);
    }

    /**
     * Preview translation without saving
     */
    public function preview(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'emojis' => 'required|array',
            'emojis.*' => 'string'
        ]);

        // Group emojis by category for better context
        $groupedEmojis = [];
        foreach ($validated['emojis'] as $emoji) {
            $category = $this->emojiTranslator->getCategoryForEmoji($emoji);
            if ($category) {
                $categoryName = $category->getCategoryName();
                $groupedEmojis[$categoryName][] = [
                    'emoji' => $emoji,
                    'translation' => $category->translate($emoji)
                ];
            } else {
                $groupedEmojis['Other'][] = [
                    'emoji' => $emoji,
                    'translation' => $emoji
                ];
            }
        }

        return response()->json([
            'grouped_translations' => $groupedEmojis,
            'final_translation' => $this->emojiTranslator->translate($validated['emojis'])
        ]);
    }
}
