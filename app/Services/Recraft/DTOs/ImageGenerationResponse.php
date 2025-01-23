<?php

namespace App\Services\Recraft\DTOs;

class ImageGenerationResponse
{
    /**
     * @param array<string> $images Array of image URLs
     * @param string $requestId The request ID from the API
     */
    public function __construct(
        public readonly array $images,
        public readonly string $requestId
    ) {}

    /**
     * Create a new instance from an API response array
     *
     * @param array $response
     * @param string $requestId
     * @return static
     */
    public static function fromApiResponse(array $response, string $requestId): self
    {
        $images = array_map(
            fn($image) => $image['url'],
            $response['images'] ?? []
        );

        return new self($images, $requestId);
    }

    /**
     * Convert the response to an array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'images' => $this->images,
            'request_id' => $this->requestId,
        ];
    }
}
