<?php

use Dotenv\Dotenv;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// loads all the dependencies required by the application
require_once __DIR__.'/../vendor/autoload.php';

// creating a new instance of the Application
$app = new Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

// Loading the dotenv file
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// custom configuration for routes
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
