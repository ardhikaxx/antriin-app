<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role.admin' => \App\Http\Middleware\RoleAdmin::class,
            'role.owner' => \App\Http\Middleware\RoleOwner::class,
            'role.petugas' => \App\Http\Middleware\RolePetugas::class,
            'role.pelanggan' => \App\Http\Middleware\RolePelanggan::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
