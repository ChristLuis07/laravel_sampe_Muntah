<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NewsService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.newsapi.key');
        $this->baseUrl = 'https://newsapi.org/v2';
    }

    public function getTopHeadLines($country = 'us', $category = null)
    {
        $url = $this->baseUrl . '/top-headlines';
        $response = Http::get($url, [
            'country' => $country,
            'category' => $category,
            'apiKey' => $this->apiKey,
        ]);



        if ($response->successful()) {
            return $response->json()['articles'];
        }

        return [];
    }
}
