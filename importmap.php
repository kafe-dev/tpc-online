<?php

return [
    'app' => [
        'path' => './assets/app/app.js',
        'entrypoint' => true,
    ],
    'admin' => [
        'path' => './assets/admin/admin.js',
        'entrypoint' => true,
    ],
    '@hotwired/stimulus' => [
        'version' => '3.2.2',
    ],
    '@symfony/stimulus-bundle' => [
        'path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js',
    ],
    '@hotwired/turbo' => [
        'version' => '7.3.0',
    ],
];