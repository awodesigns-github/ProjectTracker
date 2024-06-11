<?php

namespace App\Http\Controllers;

use App\Services\GithubService;
use Illuminate\Http\Request;

class GithubController extends Controller
{
    protected $service;

    public function __construct(GithubService $service)
    {
        $this->service = $service;
    }

    public function getAuthenticatedUserInfo($username)
    {
        $info = $this->service->getUserInformation($username);
        return response()->json($info);
    }

    public function getRepositories($username)
    {
        $repoInfo = $this->service->getRepositories($username);
        
        $content_array = json_decode($repoInfo->body(), true);

        return $content_array;
    }
}
