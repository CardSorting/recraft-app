<?php

namespace App\Services\Recraft;

class EmojiTranslator
{
    /**
     * Translate emojis to descriptive text for image generation
     */
    public function translate(array $emojis): string
    {
        $translations = [
            '🐼' => 'panda',
            '🎨' => 'colorful artistic',
            '🌅' => 'sunset scene',
            '🌲' => 'forest',
            '🏰' => 'castle',
            '🌊' => 'ocean waves',
            '🌸' => 'cherry blossoms',
            '🎭' => 'dramatic theatrical',
            '🎪' => 'circus theme',
            '🎡' => 'carnival',
            '🗽' => 'statue of liberty',
            '🎸' => 'rock music',
            '📚' => 'library books',
            '🎮' => 'video game style',
            '🎬' => 'cinematic scene',
            '🚀' => 'space exploration',
            '🌌' => 'galaxy cosmic',
            '🏔️' => 'mountain landscape',
            '🏖️' => 'beach scene',
            '🌺' => 'tropical flowers',
            '🦁' => 'lion',
            '🐯' => 'tiger',
            '🐉' => 'dragon',
            '🦄' => 'magical unicorn',
            '🎭' => 'dramatic theatrical',
            '🏛️' => 'ancient greek architecture',
            '🗿' => 'ancient mysterious',
            '🎪' => 'circus performance',
            '🎠' => 'vintage carousel',
            '🎨' => 'artistic painting',
            // Add more emoji translations as needed
        ];

        $descriptions = array_map(function($emoji) use ($translations) {
            return $translations[$emoji] ?? $emoji;
        }, $emojis);

        // Combine descriptions with some connecting words
        return implode(' and ', array_filter($descriptions)) . ' in a beautiful composition';
    }
}
