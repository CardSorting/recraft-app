<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use fal;

class RecraftController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string|min:10|max:500'
        ]);

        try {
            $result = fal()->subscribe('fal-ai/recraft-v3', [
                'input' => [
                    'prompt' => $request->prompt,
                    'image_size' => 'square_hd',
                    'style' => 'realistic_image'
                ],
                'logs' => true
            ]);

            return view('generate', [
                'imageUrl' => $result->data['images'][0]['url']
            ]);
            
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Image generation failed: '.$e->getMessage()]);
        }
    }
}
