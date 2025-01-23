<?php

namespace App\Services\Emoji\Categories;

class AnimalEmojiCategory extends AbstractEmojiCategory
{
    public function getCategoryName(): string
    {
        return 'Animals';
    }

    public function getCategoryIcon(): string
    {
        return '🦁';
    }

    public function getEmojis(): array
    {
        return [
            '🦁' => 'majestic lion',
            '🐯' => 'fierce tiger',
            '🐼' => 'cute panda',
            '🦄' => 'magical unicorn',
            '🐘' => 'large elephant',
            '🦒' => 'tall giraffe',
            '🦊' => 'clever fox',
            '🐺' => 'wild wolf',
            '🐅' => 'bengal tiger',
            '🦓' => 'striped zebra',
            '🦬' => 'strong bison',
            '🦃' => 'colorful turkey',
            '🦅' => 'soaring eagle',
            '🦢' => 'graceful swan',
            '🦩' => 'pink flamingo',
            '🦜' => 'tropical parrot',
            '🦋' => 'beautiful butterfly',
            '🐉' => 'mythical dragon',
            '🐢' => 'wise turtle',
            '🐠' => 'tropical fish',
            '🐋' => 'giant whale',
            '🐡' => 'pufferfish',
            '🦈' => 'fierce shark',
            '🐪' => 'desert camel',
            '🦘' => 'jumping kangaroo',
            '🦨' => 'striped skunk',
            '🦡' => 'forest badger',
            '🦫' => 'busy beaver',
            '🦭' => 'playful seal',
            '🐿️' => 'foraging squirrel'
        ];
    }

    /**
     * Override translate to add animal-specific context
     */
    public function translate(string $emoji): string
    {
        $translation = parent::translate($emoji);
        return $translation . " in its natural habitat";
    }
}
