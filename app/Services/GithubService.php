<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GitHubService
{
    protected $baseUrl = 'https://api.github.com';
    protected $token;

    public function __construct()
    {
        $this->token = env('GITHUB_TOKEN');
    }

    public function getUserRepositories($username)
    {
        $response = Http::withToken($this->token)->get("{$this->baseUrl}/users/{$username}/repos");

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }
}