<?php

namespace App\Services\Emoji\Categories;

use App\Services\Emoji\Contracts\EmojiCategoryInterface;

abstract class AbstractEmojiCategory implements EmojiCategoryInterface
{
    /**
     * Get all emojis for this category
     *
     * @return array<string, string>
     */
    abstract public function getEmojis(): array;

    /**
     * Get the category name
     *
     * @return string
     */
    abstract public function getCategoryName(): string;

    /**
     * Get the category icon
     *
     * @return string
     */
    abstract public function getCategoryIcon(): string;

    /**
     * Translate a specific emoji
     *
     * @param string $emoji
     * @return string
     */
    public function translate(string $emoji): string
    {
        $emojis = $this->getEmojis();
        return $emojis[$emoji] ?? $emoji;
    }

    /**
     * Check if this category handles the given emoji
     *
     * @param string $emoji
     * @return bool
     */
    public function handlesEmoji(string $emoji): bool
    {
        return array_key_exists($emoji, $this->getEmojis());
    }

    /**
     * Get emoji descriptions for the API
     *
     * @return array<string, array>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->getCategoryName(),
            'icon' => $this->getCategoryIcon(),
            'emojis' => $this->getEmojis(),
        ];
    }
}
