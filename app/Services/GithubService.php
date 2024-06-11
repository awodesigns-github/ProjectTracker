<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class GithubService {

    protected $baseUrl = 'https://api.github.com';
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;   
    }
    
    public function authenticateUser() {
        //
    }

    public function getRepositories($username) {
        $url = "{$this->baseUrl}/users/{$username}/repos";
        $repo = Http::withToken($this->token)->get($url);

        if ($repo->successful()) {
            return $repo;
        }
    
        return response()->json([
            'error' => $repo->status(),
            'message' => $repo->body()
        ], $repo->status());
    }

    public function getUserInformation($username) {
        $url = "{$this->baseUrl}/user/{$username}";
        $info = Http::withToken($this->token)->get($url);

        if ($info->successful() && $info instanceof JsonResponse) {
            $info = $info->getData(true);
            return response()->json($info);
        }

        return [
            'error' => $info->status(),
            'message' => $info->body()
        ];
    }
}