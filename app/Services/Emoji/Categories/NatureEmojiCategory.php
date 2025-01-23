<?php

namespace App\Services\Emoji\Categories;

class NatureEmojiCategory extends AbstractEmojiCategory
{
    public function getCategoryName(): string
    {
        return 'Nature';
    }

    public function getCategoryIcon(): string
    {
        return '🌿';
    }

    public function getEmojis(): array
    {
        return [
            '🌲' => 'forest trees',
            '🌺' => 'tropical flower',
            '🌸' => 'cherry blossom',
            '🌼' => 'daisy flower',
            '🌻' => 'sunflower',
            '🌹' => 'rose',
            '🌵' => 'desert cactus',
            '🌴' => 'palm tree',
            '🍁' => 'autumn maple leaf',
            '🌿' => 'herb plant',
            '🍄' => 'mushroom',
            '🌾' => 'sheaf of rice',
            '🌷' => 'tulip flower',
            '🌱' => 'seedling plant',
            '🎋' => 'bamboo',
            '🌳' => 'deciduous tree',
            '🌊' => 'ocean wave',
            '🌅' => 'sunset scene',
            '🏔️' => 'snow-capped mountain',
            '⛰️' => 'mountain',
            '🌋' => 'volcano',
            '🏖️' => 'beach with umbrella',
            '🏜️' => 'desert',
            '🌄' => 'sunrise over mountains',
            '🌡️' => 'hot temperature',
            '❄️' => 'snowflake',
            '🌪️' => 'tornado',
            '🌈' => 'rainbow',
            '☀️' => 'sun',
            '🌙' => 'crescent moon',
            '⭐' => 'star',
            '🌟' => 'glowing star',
            '✨' => 'sparkles'
        ];
    }

    /**
     * Override translate to add nature-specific context
     */
    public function translate(string $emoji): string
    {
        $translation = parent::translate($emoji);
        return "natural " . $translation;
    }
}
