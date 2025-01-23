<?php

namespace App\Services\Recraft;

use App\Services\Recraft\Contracts\RecraftServiceInterface;
use App\Services\Recraft\DTOs\ImageGenerationRequest;
use App\Services\Recraft\DTOs\ImageGenerationResponse;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;

class RecraftService implements RecraftServiceInterface
{
    private const SCRIPT_PATH = 'app/Services/Recraft/fal-client.js';

    public function __construct()
    {
        if (!config('services.fal.key')) {
            throw new Exception('FAL API key is not configured');
        }
    }

    public function generateImage(ImageGenerationRequest $request): ImageGenerationResponse
    {
        try {
            $input = json_encode($request->toArray());
            
            $process = Process::env(['FAL_KEY' => config('services.fal.key')])
                ->run("node -e 'import(\"./app/Services/Recraft/fal-client.js\").then(({generateImage}) => generateImage({$input}).then(console.log))'");

            if (!$process->successful()) {
                throw new Exception('Node script execution failed: ' . $process->errorOutput());
            }

            $result = json_decode($process->output(), true);
            
            if (!$result['success']) {
                throw new Exception($result['error'] ?? 'Unknown error occurred');
            }

            return ImageGenerationResponse::fromApiResponse($result['data'], $result['requestId']);
        } catch (Exception $e) {
            Log::error('Recraft API Error: ' . $e->getMessage(), [
                'prompt' => $request->prompt,
                'exception' => $e,
            ]);
            throw $e;
        }
    }

    public function getGenerationStatus(string $requestId): array
    {
        try {
            $process = Process::env(['FAL_KEY' => config('services.fal.key')])
                ->run("node -e 'import(\"./app/Services/Recraft/fal-client.js\").then(({getStatus}) => getStatus(\"{$requestId}\").then(console.log))'");

            if (!$process->successful()) {
                throw new Exception('Node script execution failed: ' . $process->errorOutput());
            }

            $result = json_decode($process->output(), true);
            
            if (!$result['success']) {
                throw new Exception($result['error'] ?? 'Unknown error occurred');
            }

            return $result['data'];
        } catch (Exception $e) {
            Log::error('Recraft API Status Check Error: ' . $e->getMessage(), [
                'request_id' => $requestId,
                'exception' => $e,
            ]);
            throw $e;
        }
    }
}
