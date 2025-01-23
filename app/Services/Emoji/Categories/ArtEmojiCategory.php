<?php

namespace App\Services\Emoji\Categories;

class ArtEmojiCategory extends AbstractEmojiCategory
{
    public function getCategoryName(): string
    {
        return 'Art & Entertainment';
    }

    public function getCategoryIcon(): string
    {
        return '🎨';
    }

    public function getEmojis(): array
    {
        return [
            '🎨' => 'artist palette with vibrant colors',
            '🎭' => 'dramatic theater masks',
            '🎪' => 'circus tent performance',
            '🎡' => 'colorful ferris wheel',
            '🎠' => 'ornate carousel horse',
            '🎬' => 'cinematic movie scene',
            '🎮' => 'video game style',
            '🎸' => 'electric guitar music',
            '🎺' => 'golden trumpet',
            '🎻' => 'classical violin',
            '🎹' => 'piano keys',
            '🎤' => 'stage microphone',
            '🎭' => 'theatrical performance',
            '🖼️' => 'framed artwork',
            '🎪' => 'circus performance',
            '🎢' => 'thrilling roller coaster',
            '🎫' => 'admission ticket',
            '🎨' => 'artistic painting',
            '🎵' => 'musical notes',
            '🎼' => 'musical score',
            '🎙️' => 'studio microphone',
            '🎧' => 'dj headphones',
            '🪩' => 'disco ball',
            '🎭' => 'performing arts',
            '🎪' => 'circus tent',
            '🎯' => 'bullseye target',
            '🎲' => 'game dice',
            '🎼' => 'sheet music',
            '🎹' => 'musical keyboard',
            '🎨' => 'art palette'
        ];
    }

    /**
     * Override translate to add artistic context
     */
    public function translate(string $emoji): string
    {
        $translation = parent::translate($emoji);
        return "artistic " . $translation . " in a creative composition";
    }
}
