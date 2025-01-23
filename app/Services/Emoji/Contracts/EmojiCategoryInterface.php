<?php

namespace App\Services\Emoji\Contracts;

interface EmojiCategoryInterface
{
    /**
     * Get all emojis in this category
     *
     * @return array<string, string> Array of emoji => description pairs
     */
    public function getEmojis(): array;

    /**
     * Translate a specific emoji from this category
     *
     * @param string $emoji The emoji character
     * @return string The translated description
     */
    public function translate(string $emoji): string;

    /**
     * Get the category name
     *
     * @return string
     */
    public function getCategoryName(): string;

    /**
     * Get the emoji that represents this category
     *
     * @return string
     */
    public function getCategoryIcon(): string;

    /**
     * Check if this category handles the given emoji
     *
     * @param string $emoji
     * @return bool
     */
    public function handlesEmoji(string $emoji): bool;
}
