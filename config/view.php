<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most template systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    | IMPORTANT: For zero-downtime deployments with symlinks, use base_path()
    | instead of storage_path() to store compiled views per release.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        env('APP_ENV') === 'production'
            ? base_path('storage/framework/views') // Per-release dans production
            : storage_path('framework/views') // Partagé en local
    ),

];