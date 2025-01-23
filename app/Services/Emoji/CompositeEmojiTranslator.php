<?php

namespace App\Services\Emoji;

use App\Services\Emoji\Contracts\EmojiCategoryInterface;
use App\Services\Emoji\Contracts\EmojiTranslatorInterface;
use App\Services\Emoji\Categories\NatureEmojiCategory;
use App\Services\Emoji\Categories\AnimalEmojiCategory;
use App\Services\Emoji\Categories\ArtEmojiCategory;

class CompositeEmojiTranslator implements EmojiTranslatorInterface
{
    /** @var array<EmojiCategoryInterface> */
    private array $categories;

    public function __construct()
    {
        $this->categories = [
            new NatureEmojiCategory(),
            new AnimalEmojiCategory(),
            new ArtEmojiCategory(),
            // Add more categories as they are created
        ];
    }

    public function translate(array $emojis): string
    {
        $translations = [];
        
        foreach ($emojis as $emoji) {
            $category = $this->getCategoryForEmoji($emoji);
            if ($category) {
                $translations[] = $category->translate($emoji);
            } else {
                $translations[] = $emoji;
            }
        }

        // Combine translations with context-aware connecting words
        if (count($translations) === 1) {
            return $translations[0];
        }

        $lastTranslation = array_pop($translations);
        $translationString = implode(', ', $translations);

        return $translationString . ' and ' . $lastTranslation . ' together in a beautiful composition';
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function getCategoryForEmoji(string $emoji): ?EmojiCategoryInterface
    {
        foreach ($this->categories as $category) {
            if ($category->handlesEmoji($emoji)) {
                return $category;
            }
        }

        return null;
    }

    public function getAllEmojis(): array
    {
        $allEmojis = [];
        
        foreach ($this->categories as $category) {
            $allEmojis[$category->getCategoryName()] = [
                'icon' => $category->getCategoryIcon(),
                'emojis' => $category->getEmojis()
            ];
        }

        return $allEmojis;
    }

    /**
     * Get suggestions for emoji combinations
     *
     * @param string $emoji
     * @return array<string> Array of suggested emoji combinations
     */
    public function getSuggestions(string $emoji): array
    {
        $category = $this->getCategoryForEmoji($emoji);
        if (!$category) {
            return [];
        }

        // Example suggestion logic based on category
        $suggestions = [];

        // If it's a nature emoji, suggest animals that live in that environment
        if ($category instanceof NatureEmojiCategory) {
            foreach ($this->categories as $otherCategory) {
                if ($otherCategory instanceof AnimalEmojiCategory) {
                    // Get 3 random animal emojis
                    $animalEmojis = array_keys($otherCategory->getEmojis());
                    shuffle($animalEmojis);
                    $suggestions = array_slice($animalEmojis, 0, 3);
                }
            }
        }

        // If it's an animal, suggest its natural habitat
        if ($category instanceof AnimalEmojiCategory) {
            foreach ($this->categories as $otherCategory) {
                if ($otherCategory instanceof NatureEmojiCategory) {
                    // Get 3 random nature emojis
                    $natureEmojis = array_keys($otherCategory->getEmojis());
                    shuffle($natureEmojis);
                    $suggestions = array_slice($natureEmojis, 0, 3);
                }
            }
        }

        return $suggestions;
    }
}
