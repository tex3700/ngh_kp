<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',

        // Добавляем маршруты для FileManager
        then: function () {
            Route::group([
                'prefix' => 'laravel-filemanager',
                'middleware' => ['moonshine', 'auth.moonshine']
            ], function () {
                \UniSharp\LaravelFilemanager\Lfm::routes();
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
