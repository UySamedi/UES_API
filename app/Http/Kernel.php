<?php
class Kernel extends HttpKernel
{
    // ...existing code...

    protected $routeMiddleware = [
        // ... other middleware ...
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];

    // ...existing code...
}