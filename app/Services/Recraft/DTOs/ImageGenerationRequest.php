<?php

namespace App\Services\Recraft\DTOs;

class ImageGenerationRequest
{
    public function __construct(
        public readonly string $prompt,
        public readonly string $imageSize = 'square_hd',
        public readonly ?string $style = 'realistic_image',
        public readonly ?array $colors = [],
        public readonly ?string $styleId = null
    ) {}

    public function toArray(): array
    {
        return array_filter([
            'prompt' => $this->prompt,
            'image_size' => $this->imageSize,
            'style' => $this->style,
            'colors' => $this->colors,
            'style_id' => $this->styleId,
        ], fn($value) => !is_null($value));
    }
}
