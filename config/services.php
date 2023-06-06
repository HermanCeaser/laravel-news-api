<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'news-api' => [
        'url' => env('NEWSAPI_BASE_URL', 'https://newsapi.org/v2'),
        'key' => env('NEWSAPI_KEY')
    ],
    'guardian-api' => [
        'url' => env('GUARDIANAPI_BASE_URL', 'https://content.guardianapis.com'),
        'key' => env('GUARDIANAPI_KEY'),
    ],
    'newyork-times-api' => [
        'url' => env('NEWYORKTIMESAPI_BASE_URL', 'https://api.nytimes.com/'),
        'key' => env('NEWYORKTIMESAPI_KEY'),
    ]

];
