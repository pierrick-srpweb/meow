<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Livewire\Features\SupportLockedProperties\CannotUpdateLockedPropertyException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            \App\Http\Middleware\SecurityHeaders::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->dontReportWhen(function (Throwable $e) {
            if (auth()->check()) {
                return false;
            }

            // Tentatives de manipulation de propriétés lockées par des bots
            if ($e instanceof CannotUpdateLockedPropertyException) {
                return true;
            }

            // TypeError causés par des payloads Livewire corrompus (bots)
            if ($e instanceof TypeError && str_contains($e->getFile(), 'livewire')) {
                return true;
            }

            return false;
        });
    })->create();
