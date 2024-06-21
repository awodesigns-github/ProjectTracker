<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GithubWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->all();
        dd($payload);
    }
}
