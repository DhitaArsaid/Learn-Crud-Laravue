<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*'], // Izinkan semua endpoint API

    'allowed_methods' => ['*'], // Semua method diizinkan (GET, POST, PUT, DELETE)

    'allowed_origins' => ['http://localhost:5173'], // Izinkan akses dari Vue 3

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // Semua header diizinkan

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
