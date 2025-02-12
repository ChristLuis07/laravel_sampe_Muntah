<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class PexelsHelper
{
    public static function getGambarUrl($query)
    {
        $apiKey = env('PEXELS_API_KEY');

        $response = Http::withHeaders([
            'Authorization' => $apiKey
        ])->get('https://api.pexels.com/v1/search', [
            'query' => $query,
            'per_page' => 1
        ]);

        if ($response->successful()) {
            return $response->json()['photos'][0]['src']['large'] ?? null;
        }

        return null;
    }
}
