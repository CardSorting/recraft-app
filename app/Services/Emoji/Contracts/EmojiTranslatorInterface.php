<?php

namespace App\Services\Emoji\Contracts;

interface EmojiTranslatorInterface
{
    /**
     * Translate an array of emojis into a descriptive prompt
     *
     * @param array<string> $emojis Array of emoji characters
     * @return string The translated prompt
     */
    public function translate(array $emojis): string;

    /**
     * Get all available emoji categories
     *
     * @return array<EmojiCategoryInterface>
     */
    public function getCategories(): array;

    /**
     * Find the category that handles the given emoji
     *
     * @param string $emoji
     * @return EmojiCategoryInterface|null
     */
    public function getCategoryForEmoji(string $emoji): ?EmojiCategoryInterface;

    /**
     * Get all available emojis grouped by category
     *
     * @return array<string, array<string, string>> Category name => [emoji => description]
     */
    public function getAllEmojis(): array;
}
