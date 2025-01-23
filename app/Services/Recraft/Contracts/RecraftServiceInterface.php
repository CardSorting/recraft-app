<?php

namespace App\Services\Recraft\Contracts;

use App\Services\Recraft\DTOs\ImageGenerationRequest;
use App\Services\Recraft\DTOs\ImageGenerationResponse;

interface RecraftServiceInterface
{
    /**
     * Generate an image using the Recraft API
     *
     * @param ImageGenerationRequest $request
     * @return ImageGenerationResponse
     */
    public function generateImage(ImageGenerationRequest $request): ImageGenerationResponse;

    /**
     * Get the status of a generation request
     *
     * @param string $requestId
     * @return array
     */
    public function getGenerationStatus(string $requestId): array;
}
