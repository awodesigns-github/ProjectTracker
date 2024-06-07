<?php

namespace App\Http\Controllers;

use App\Services\GithubService;

class GitHubController extends Controller
{
    protected $gitHubService;

    public function __construct(GitHubService $gitHubService)
    {
        $this->gitHubService = $gitHubService;
    }

    public function getUserRepositories($username)
    {
        $repositories = $this->gitHubService->getUserRepositories($username);
        return response()->json($repositories);
    }
}
